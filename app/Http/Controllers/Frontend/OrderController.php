<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Shipping;
use App\User;
use PDF;
use Notification;
use Helper;
use Lang;
use Session;
use DB;
use Illuminate\Support\Str;
use App\Notifications\StatusNotification;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::orderBy('id','DESC')->paginate(10);
        return view('backend.order.index')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /* Save New order */
    public function store(Request $request)
    {
        $cart_data = Cart::with('product')->where('user_id', auth()->user()->id)->get();

        // Check if cart empty
        if(empty($cart_data)){
            session()->flash('error', Lang::get('message.response.cart_empty'));
            return back();
        }

        $cart = Helper::getCart();

        $coupon = 0;
        if(Session::has('coupon')) $coupon = Helper::getCouponDiscount($cart['subtotal']);

        $order = new Order();

        $order_data = $request->all();

        $order_data['user_id'] = $request->user()->id;
        $order_data['order_number'] = 'ELEGANCE'.date('Y').'-'.date('md').strtoupper(Str::random(10));
        $order_data['shipping_id'] = $request->shipping_method;
        $order_data['sub_total'] = $cart['subtotal'];
        $order_data['coupon'] = $coupon;

        $shipping_fee = 0.0;
        if($request->shipping_method > 0) {
            $shipping_methods = DB::table('shipping_methods')->where('id', $request->shipping_method)->first();
            $shipping = DB::table('shipping_zones')->where('id', $shipping_methods->zone_id)->first();
            $shipping_fee = Helper::getCHF($shipping_methods->value, $shipping->currency);
        }

        $order_data['delivery_charge'] = $shipping_fee;
        $order_data['total_amount'] = $cart['subtotal'] - $coupon + $shipping_fee;
        $order_data['status'] = "new";

        if($request->payment == 'paypal'){
            $order_data['payment_method'] = 'paypal';
            $order_data['payment_status'] = 'paid';
        } else{
            $order_data['payment_method'] = 'cod';
            $order_data['payment_status'] = 'Unpaid';
        }

        $order_data['different_shipping'] = $request->has('different_shipping');
        $order_data['currency'] = Helper::getLocaleCurrency()->name;
        $order_data['rate'] = Helper::getLocaleCurrency()->rate;

        // dd($order_data);

        $order->fill($order_data);
        $status = $order->save();
        if($order)
        // dd($order->id);
        // $users=User::where('role','admin')->first();
        // $details=[
        //     'title'=>'New order created',
        //     'actionURL'=>route('user.order.show',$order->id),
        //     'fas'=>'fa-file-alt'
        // ];
        // Notification::send($users, new StatusNotification($details));

        if($request->payment == 'paypal'){
            return redirect()->route('payment')->with(['id' => $order->id]);
        } else {
            session()->forget('cart');
            session()->forget('coupon');
        }

        //Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => $order->id]);

        // dd($users);
        request()->session()->flash('success','Your product successfully placed in order');
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order=Order::find($id);
        // return $order;
        return view('backend.order.show')->with('order',$order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order=Order::find($id);
        return view('backend.order.edit')->with('order',$order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order=Order::find($id);
        $this->validate($request,[
            'status'=>'required|in:new,process,delivered,cancel'
        ]);
        $data=$request->all();
        // return $request->status;
        if($request->status=='delivered'){
            foreach($order->cart as $cart){
                $product=$cart->product;
                // return $product;
                $product->stock -=$cart->quantity;
                $product->save();
            }
        }
        $status=$order->fill($data)->save();
        if($status){
            request()->session()->flash('success','Successfully updated order');
        }
        else{
            request()->session()->flash('error','Error while updating order');
        }
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order=Order::find($id);
        if($order){
            $status=$order->delete();
            if($status){
                request()->session()->flash('success','Order Successfully deleted');
            }
            else{
                request()->session()->flash('error','Order can not deleted');
            }
            return redirect()->route('order.index');
        }
        else{
            request()->session()->flash('error','Order can not found');
            return redirect()->back();
        }
    }

    /* Render Track Order Page */
    public function orderTrack()
    {
        $title = Lang::get('title.track_order');

        return view('frontend.pages.order-track')->withTitle($title);
    }

    /* Ajax Tracking Order Status */
    public function productTrackOrder(Request $request)
    {
        $order = Order::where('order_number', $request->order_number)->first();
        if($order){
            if($order->status=="new"){
            request()->session()->flash('success','Your order has been placed. please wait.');
            return redirect()->route('home');

            }
            elseif($order->status=="process"){
                request()->session()->flash('success','Your order is under processing please wait.');
                return redirect()->route('home');

            }
            elseif($order->status=="delivered"){
                request()->session()->flash('success','Your order is successfully delivered.');
                return redirect()->route('home');

            }
            else{
                request()->session()->flash('error','Your order canceled. please try again');
                return redirect()->route('home');

            }
        }
        else{
            request()->session()->flash('error','Invalid order numer please try again');
            return back();
        }
    }

    // PDF generate
    public function pdf(Request $request){
        $order=Order::getAllOrder($request->id);
        // return $order;
        $file_name=$order->order_number.'-'.$order->first_name.'.pdf';
        // return $file_name;
        $pdf=PDF::loadview('backend.order.pdf',compact('order'));
        return $pdf->download($file_name);
    }
    // Income chart
    public function incomeChart(Request $request){
        $year=\Carbon\Carbon::now()->year;
        // dd($year);
        $items=Order::with(['cart_info'])->whereYear('created_at',$year)->where('status','delivered')->get()
            ->groupBy(function($d){
                return \Carbon\Carbon::parse($d->created_at)->format('m');
            });
            // dd($items);
        $result=[];
        foreach($items as $month=>$item_collections){
            foreach($item_collections as $item){
                $amount=$item->cart_info->sum('amount');
                // dd($amount);
                $m=intval($month);
                // return $m;
                isset($result[$m]) ? $result[$m] += $amount :$result[$m]=$amount;
            }
        }
        $data=[];
        for($i=1; $i <=12; $i++){
            $monthName=date('F', mktime(0,0,0,$i,1));
            $data[$monthName] = (!empty($result[$i]))? number_format((float)($result[$i]), 2, '.', '') : 0.0;
        }
        return $data;
    }
}
