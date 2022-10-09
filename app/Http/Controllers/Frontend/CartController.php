<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\Cart;
use App\User;
use Lang;
use Auth;
use Session;
use DB;
use Helper;

class CartController extends Controller
{
    /* Render Cart Page */
    public function index()
    {
        $title = Lang::get('title.shopping_cart');

        $sub_total = 0.0;
        $shipping_fee = 0.0;

        $data['content'] = Cart::with('product')->where('user_id', Auth::user()->id)->get();

        foreach($data['content'] as $item){
            $item_price = Helper::getCartItemPrice($item->id);
            $sub_total += $item_price * $item->quantity;
        }

        $data['sub_total'] = $sub_total;

        $coupon = 0.0;
        if(Session::has('coupon')) $coupon = Helper::getCouponDiscount($sub_total);

        $data['total'] = $sub_total + $shipping_fee - $coupon;

        return view('frontend.pages.cart', $data)->withTitle($title);
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

    /* Ajax Get States by Country */
    public function getStates(Request $request)
    {
        try {

            $data_states = DB::table('states')->where('country_id', $request->country_id)->get();

            $shipping = DB::table('shipping_zones')->where('country_ids', $request->country_id)->first();
            if(empty($shipping)) $shipping = DB::table('shipping_zones')->where('country_ids', 0)->first();
            $shipping_methods = DB::table('shipping_methods')->where('zone_id', $shipping->id)->get();
            foreach($shipping_methods as $item){
                $item->converted_val = number_format(Helper::getPriceByCurrency(Helper::getCHF($item->value, $shipping->currency)), 2);
            }

            $cart = Helper::getCart();
            $sub_total = $cart['subtotal'];

            $coupon = 0.0;
            if(Session::has('coupon')) $coupon = Helper::getCouponDiscount($sub_total);

            $is_free_shipping = $sub_total > $shipping->free_limit ? 1 : 0;
            $shipping_fee = 0.0;
            if(!$is_free_shipping) {
                $shipping_fee = Helper::getCHF($shipping_methods[0]->value, $shipping->currency);
            }

            $total = $sub_total -$coupon + $shipping_fee;

            $err = array(
                'status' => 'success',
                'states' => $data_states,
                'shipping_methods' => $shipping_methods,
                'total' => Helper::getLocaleCurrency()->symbol.number_format(Helper::getPriceByCurrency($total), 2),
                'is_free_shipping' => $is_free_shipping
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
                'message' => Lang::get('message.response.invalid_param'),
            );
            return response()->json($err);
        }
        else
        {
            $product = Product::find($request->product_id);

            if ( ($request->quantity < 1) || empty($product) ) {
                $err = array(
                    'status' => 'error',
                    'message' => Lang::get('message.response.invalid_param'),
                );
                return response()->json($err);
            }

            if($product->stock < 1 && $product->backorder == 'disable')
            {
                $err = array(
                    'status' => 'error',
                    'message' => Lang::get('message.response.out_of_stock'),
                );
                return response()->json($err);
            }

            if($product->stock < $request->quantity && $product->backorder == 'disable')
            {
                $err = array(
                    'status' => 'error',
                    'message' => Lang::get('message.response.stock_not_enough'),
                );
                return response()->json($err);
            }

            if(Auth::check())
            {
                $current_cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first();

                if(!empty($current_cart) && ($product->template == 'default' || $product->template == 'glasses'))
                {
                    if($current_cart->quantity + $request->quantity > $product->stock && $product->backorder == 'disable')
                    {
                        $err = array(
                            'status' => 'error',
                            'message' => Lang::get('message.response.stock_not_enough'),
                        );
                        return response()->json($err);

                    } else {
                        $current_cart->quantity += $request->quantity;
                        $current_cart->save();

                        $res = array(
                            'status' => 'success',
                            'message' => Lang::get('message.response.add_cart_success'),
                            'cart' => view('frontend.component.shopping-cart')->render()
                        );

                        return response()->json($res);
                    }

                } else {

                    $cart = new Cart;

                    $cart->user_id = auth()->user()->id;
                    $cart->product_id = $product->id;
                    $cart->quantity = $request->quantity;

                    $cart->SPH_r = $request->SPH_r;
                    $cart->SPH_l = $request->SPH_l;
                    $cart->DIA_r = $request->DIA_r;
                    $cart->DIA_l = $request->DIA_l;
                    $cart->CYL_r = $request->CYL_r;
                    $cart->CYL_l = $request->CYL_l;
                    $cart->AXIS_r = $request->AXIS_r;
                    $cart->AXIS_l = $request->AXIS_l;
                    $cart->RAD_r = $request->RAD_r;
                    $cart->RAD_l = $request->RAD_l;
                    $cart->quantity_r = $request->quantity_r;
                    $cart->quantity_l = $request->quantity_l;
                    $cart->eye_diff = $request->diff_eye;

                    $cart->save();

                    $res = array(
                        'status' => 'success',
                        'message' => Lang::get('message.response.add_cart_success'),
                        'cart' => view('frontend.component.shopping-cart')->render()
                    );

                    return response()->json($res);
                }

            } else {

                Session::push('carts', $product);

                if(1){
                    $err = array(
                        'status' => 'success',
                        'message' => Lang::get('message.response.add_cart_success'),
                        'data' => Session::get('carts'),
                        'cart' => view('frontend.component.shopping-cart')->render()
                    );
                } else {
                    $err = array(
                        'status' => 'error',
                        'message' => Lang::get('message.response.out_of_stock')
                    );
                }

                return response()->json($err);
            }

            request()->session()->flash('success','Product successfully added to cart.');
            return back();
        }
    }

    /* Ajax Remove from Cart */
    public function cartRemove(Request $request)
    {
        $cart = Cart::find($request->id);
        if ($cart) {
            $cart->delete();
            $err = array(
                'status' => 'success',
                'message' => Lang::get('message.response.product_remove_success'),
                'cart' => view('frontend.component.shopping-cart')->render()
            );
            return response()->json($err);
        }
        $err = array(
            'status' => 'error',
            'message' => Lang::get('message.response.something_wrong'),
        );
        return response()->json($err);
    }

    /* Delete from Cart */
    public function cartDelete(Request $request)
    {
        $cart = Cart::find($request->id);
        if ($cart) {
            $cart->delete();
            request()->session()->flash('success','Cart successfully removed');
            return back();
        }
        request()->session()->flash('error','Error please try again');
        return back();
    }


    /* Render Checkout Page */
    public function checkout(Request $request)
    {
        $title = Lang::get('title.checkout');

        $sub_total = 0.0;

        $country_id = Helper::getLocation();

        $data['content'] = Cart::with('product')->where('user_id', Auth::user()->id)->get();
        $data['countries'] = DB::table('countries')->get();
        $data['states'] = DB::table('states')->where('country_id', $country_id)->get();
        $data['user'] = User::find(auth()->user()->id);

        $shipping = DB::table('shipping_zones')->where('country_ids', 214)->first();
        if(empty($shipping)) DB::table('shipping_zones')->where('country_ids', 0)->first();

        $data['shipping'] = $shipping;
        $data['shipping_methods'] = DB::table('shipping_methods')->where('zone_id', $shipping->id)->get();

        foreach($data['content'] as $item)
        {
            $sub_total += Helper::getCartItemPrice($item->id) * $item->quantity;
        }

        $coupon = 0.0;
        if(Session::has('coupon')) $coupon = Helper::getCouponDiscount($sub_total);

        // $sub_total = 100;
        $shipping_fee = 0.0;
        $is_free_shipping = 'true';
        $shipping_id = 0;
        if($shipping->free_limit > $sub_total) {
            $shipping_fee = $data['shipping_methods'][0]->value;
            $is_free_shipping = 'false';
            $shipping_id = $data['shipping_methods'][0]->id;
        }

        $data['free_shipping'] = $is_free_shipping;
        $data['shipping_id'] = $shipping_id;
        $data['country_id'] = $country_id;
        $data['subtotal'] = $sub_total;
        $data['total'] = $sub_total - $coupon + $shipping_fee;

        return view('frontend.pages.checkout', $data)->withTitle($title);
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
}
