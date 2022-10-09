<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\Coupon;
use Lang;
use Auth;
use Session;
use DB;
use Helper;

class CouponController extends Controller
{
    /* Apply Coupon for cart */
    public function couponApply(Request $request)
    {
        $coupon = Coupon::where('code', $request->code)->first();
        // Check if Coupon valid
        if(!$coupon){
            request()->session()->flash('error', Lang::get('message.response.invalid_coupon'));
            return back();
        }
        if($coupon){
            session()->put('coupon', [
                'id' => $coupon->id,
                'code' => $coupon->code,
                'value' => $coupon->value,
                'type' => $coupon->type
            ]);
            request()->session()->flash('success', Lang::get('message.response.coupon_apply_success'));
            return redirect()->back();
        }
    }

    /* Ajax Coupon remove from checkout */
    public function couponRemove()
    {
        try {
            Session::forget('coupon');
            $arr = array(
                'status' => 'success',
                'message' => Lang::get('message.response.coupon_remove_success'),
                'total' => 1000
            );
            return response()->json($arr);
        } catch (\Exception $e) {
            $err = array(
                'status' => 'error',
                'message' => Lang::get('message.response.db_connection_error')
            );
            return response()->json($err);
        }
    }
}
