<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Lang;
use Auth;
use Helper;

class WishlistController extends Controller
{
    /* Render Wishlist Page */
    public function index()
    {
        $title = Lang::get('title.wishlist');

        $data['content'] = Wishlist::with('product')->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('frontend.pages.wishlist', $data)->withTitle($title);
    }

    /* Ajax Add Product into Wishlist */
    public function add_wishlist(Request $request)
    {
        try {

            if(Auth::check()){

                if(Helper::checkIfWishlist($request->product_id))
                {
                    $error_array = array(
                        'status' => 'error',
                        'message' => Lang::get('message.response.data_exist')
                    );
                    return response()->json($error_array);
                }

                $wishlist = new Wishlist;

                $wishlist->product_id = $request->product_id;
                $wishlist->user_id = Auth::user()->id;

                if($wishlist->save())
                {
                    $res = array(
                        'status' => 'success',
                        'message' => Lang::get('message.response.add_wishlist_success')
                    );
                    return response()->json($res);

                } else {

                    $error_array = array(
                        'status' => 'error',
                        'message' => Lang::get('message.response.db_connection_error')
                    );
                    return response()->json($error_array);
                }

            } else {

                $error_array = array(
                    'status' => 'error',
                    'message' => Lang::get('message.response.db_connection_error')
                );
                return response()->json($error_array);

            }


        } catch (\Exception $e) {

            $error_array = array(
                'status' => 'error',
                'message' => Lang::get('message.response.something_wrong')
            );
            return response()->json($error_array);
        }

    }

    /* Ajax Remove Product from Wishlist */
    public function wishlistDelete(Request $request)
    {
        try {

            $wishlist = Wishlist::find($request->product_id);
            if($wishlist)
            {
                $wishlist->delete();

                $res = array(
                    'status' => 'success',
                    'message' => Lang::get('message.response.product_remove_success')
                );
                return response()->json($res);

            } else {
                $error_array = array(
                    'status' => 'error',
                    'message' => Lang::get('message.response.invalid_param')
                );
                return response()->json($error_array);
            }

        } catch (\Exception $e) {

            $error_array = array(
                'status' => 'error',
                'message' => Lang::get('message.response.something_wrong')
            );
            return response()->json($error_array);
        }
    }
}
