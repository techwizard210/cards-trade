<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Victorybiz\LaravelCryptoPaymentGateway\LaravelCryptoPaymentGateway;
use App\Models\Wishlist;
use App\Models\Merchant;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use App\User;
use Auth;
use Session;
use DB;
use Helper;

class CartController extends Controller
{
    /* Render Cart Page */
    public function index()
    {
        $title = 'Shopping Cart';

        $sub_total = 0.0;
        $shipping_fee = 0.0;

        if(Auth::check())
        {
            $data['content'] = Cart::with('product')->where('user_id', Auth::user()->id)->get();

            foreach($data['content'] as $item)
            {
                $sub_total += $item->product->value * (100 - $item->product->discount) / 100;
            }
        }
        else
        {
            $data['content'] = Session::get('carts');
            if(!empty($data['content'])){
                foreach($data['content'] as $item)
                {
                    $sub_total += $item->value * (100 - $item->discount) / 100;
                }
            }
        }

        $data['sub_total'] = $sub_total;

        $coupon = 0.0;
        if(Session::has('coupon')) $coupon = Helper::getCouponDiscount($sub_total);

        $data['total'] = $sub_total + $shipping_fee - $coupon;

        return view('frontend.cart', $data)->withTitle($title);
    }

    /* Ajax Update Shopping Cart */
    public function updateCart(Request $request)
    {
        try {
            foreach($request->content as $list)
            {
                $cart = Cart::find($list['id']);

                $cart->quantity = $list['quantity'];
                $cart->save();
            }

            $err = array(
                'status' => 'success',
                'message' => Lang::get('message.response.cart_update_success'),
                'cart' => view('frontend.component.shopping-cart')->render()
            );
            return response()->json($err);

        } catch (\Exception $e) {

            $err = array(
                'status' => 'error',
                'message' => Lang::get('message.response.db_connection_error')
            );
            return response()->json($err);
        }
    }

    /* Ajax Add to Cart */
    public function addToCart(Request $request)
    {
        $rules = array(
            'product_id' => 'required',
            'quantity' => 'required',
        );

        $niceNames = array(
            'product_id' => 'Product ID',
            'quantity' => 'Quantity',
        );

        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($niceNames);

        if ($validator->fails())
        {
            $err = array(
                'status' => 'error',
                'message' => 'Invalid Parameter',
            );
            return response()->json($err);
        }
        else
        {
            $product = Product::find($request->product_id);

            if(Auth::check())
            {
                $cart = new Cart;

                $cart->user_id = auth()->user()->id;
                $cart->product_id = $product->id;
                $cart->quantity = $request->quantity;

                $cart->save();

                $res = array(
                    'status' => 'success',
                    'message' => 'Successfully added in your shopping cart',
                    'cart' => view('frontend.components.shopping-cart')->render()
                );

                return response()->json($res);
            }
            else
            {
                Session::push('carts', $product);

                $res = array(
                    'status' => 'success',
                    'message' => 'Successfully added in your shopping cart',
                    'cart' => view('frontend.components.shopping-cart')->render()
                );

                return response()->json($res);
            }
        }
    }

    /* Ajax Remove from Cart */
    public function cartRemove(Request $request)
    {
        if(Auth::check())
        {
            $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $request->product_id)->delete();
            $new_cart = Helper::getCart();
            $res = array(
                'status' => 'success',
                'message' => 'Product removed from your shopping cart',
                'cnt' => $new_cart['cart_count'],
                'subtotal' => $new_cart['subtotal'],
            );
            return response()->json($res);
        } else{

            if(Session::has('carts')){
                foreach (Session::get('carts') as $inex => $value) {
                  if($value->id == $request->product_id){
                    Session::pull('carts.'.$inex);
                  }
                }
            }

            $new_cart = Helper::getCart();
            $res = array(
                'status' => 'success',
                'message' => 'Product removed from your shopping cart',
                'cnt' => $new_cart['cart_count'],
                'subtotal' => $new_cart['subtotal'],
            );
            return response()->json($res);
        }
    }

    /* Delete from Cart */
    public function cartDelete(Request $request)
    {
        if(Auth::check())
        {
            $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $request->product_id)->delete();
            $new_cart = Helper::getCart();
            $res = array(
                'status' => 'success',
                'message' => 'Product removed from your shopping cart',
                'cart' => view('frontend.components.shopping-cart')->render(),
                'subtotal' => $new_cart['subtotal'],
            );
            return response()->json($res);
        } else{

            if(Session::has('carts')){
                foreach (Session::get('carts') as $inex => $value) {
                  if($value->id == $request->product_id){
                    Session::pull('carts.'.$inex);
                  }
                }
            }

            $new_cart = Helper::getCart();
            $res = array(
                'status' => 'success',
                'message' => 'Product removed from your shopping cart',
                'cart' => view('frontend.components.shopping-cart')->render(),
                'subtotal' => $new_cart['subtotal'],
            );
            return response()->json($res);
        }
    }

    /* Render Checkout Page */
    public function checkout(Request $request)
    {
        $title = 'Checkout';

        $sub_total = 0.0;

        $data['content'] = Cart::with('product')->where('user_id', Auth::user()->id)->get();
        $data['countries'] = DB::table('countries')->get();
        $data['user'] = User::find(auth()->user()->id);


 //       $data['shipping'] = $shipping;
 //       $data['shipping_methods'] = DB::table('shipping_methods')->where('zone_id', $shipping->id)->get();

        foreach($data['content'] as $item)
        {
            $sub_total += $item->product->value * ( 100 - $item->product->discount) / 100;
        }

        $coupon = 0.0;
        if(Session::has('coupon')) $coupon = Helper::getCouponDiscount($sub_total);

        // $sub_total = 100;
        $shipping_fee = 0.0;
        // $is_free_shipping = 'true';
        // $shipping_id = 0;
        // if($shipping->free_limit > $sub_total) {
        //     $shipping_fee = $data['shipping_methods'][0]->value;
        //     $is_free_shipping = 'false';
        //     $shipping_id = $data['shipping_methods'][0]->id;
        // }

        // $data['free_shipping'] = $is_free_shipping;
        // $data['shipping_id'] = $shipping_id;
        // $data['country_id'] = $country_id;
        $data['subtotal'] = $sub_total;
        $data['total'] = $sub_total - $coupon + $shipping_fee;

        return view('frontend.checkout', $data)->withTitle($title);
    }

    /* Ajax Total order by shipping method */
    public function updateCartTotal(Request $request)
    {
        $cart = Helper::getCart();
        $sub_total = $cart['subtotal'];

        $coupon = 0.0;
        if(Session::has('coupon')) $coupon = Helper::getCouponDiscount($sub_total);

        $shipping_fee = 0.0;
        if($request->shipping_id > 0) {
            $shipping = DB::table('shipping_methods')->where('shipping_methods.id', $request->shipping_id)->leftJoin('shipping_zones', 'shipping_zones.id', '=', 'shipping_methods.zone_id')->first();
            $shipping_fee = Helper::getCHF($shipping->value, $shipping->currency);
        }

        $total = $sub_total -$coupon + $shipping_fee;

        $res = array(
            'status' => 'success',
            'total' => Helper::getLocaleCurrency()->symbol.number_format(Helper::getPriceByCurrency($total), 2)
        );
        return response()->json($res);
    }

    public function saveOrder(Request $request)
    {
        $subtotal = Helper::getCart()['subtotal'];
        $products = Cart::where('user_id', Auth::user()->id)->get();

        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->payment_method = 'crypto';
        $order->payment_status = 'pending';
        $order->status = 'pending';
        $order->subtotal = $subtotal;
        $order->total = $subtotal;
        $order->save();

        foreach($products as $list)
        {
            $order_product = new OrderProduct;
            $order_product->product_id = $list->product_id;
            $order_product->order_id = $order->id;
            $order_product->save();

            Cart::find($list->id)->delete();
        }

        $payment_url = LaravelCryptoPaymentGateway::startPaymentSession([
            'amountUSD' => $subtotal, // OR 'amount' when sending BTC value
            'orderID' => $order->id,
            'userID' => Auth::user()->id,
            'redirect' => route('order.confirm'),
        ]);
        // redirect to the payment page
        return redirect()->to($payment_url);
    }

    public function confirmOrder()
    {
        $title = 'Order Success';
        return view('frontend.order-complete')->withTitle($title);
    }
}
