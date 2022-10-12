<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Auth;
use Helper;

class WishlistController extends Controller
{
    /* Render Wishlist Page */
    public function index()
    {
        $title = 'Wishlist';

        $data['content'] = Wishlist::with('merchant')->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('frontend.wishlist', $data)->withTitle($title);
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
                        'message' => 'This card already exist in your wishlist'
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
                        'message' => 'Card added in your wishlist'
                    );
                    return response()->json($res);

                } else {

                    $error_array = array(
                        'status' => 'error',
                        'message' => 'DB Connection Failed'
                    );
                    return response()->json($error_array);
                }

            } else {

                $error_array = array(
                    'status' => 'error',
                    'message' => 'DB Connection Failed'
                );
                return response()->json($error_array);

            }


        } catch (\Exception $e) {

            $error_array = array(
                'status' => 'error',
                'message' => 'Sorry, something went wrong...'
            );
            return response()->json($error_array);
        }

    }

    /* Ajax Remove Product from Wishlist */
    public function remove_wishlist(Request $request)
    {
        try {

            if(Auth::check()){

                Wishlist::where('product_id', $request->product_id)
                            ->where('user_id', Auth::user()->id)
                            ->delete();

                $res = array(
                    'status' => 'success',
                    'message' => 'Card removed from your wishlist'
                );
                return response()->json($res);

            } else {

                $error_array = array(
                    'status' => 'error',
                    'message' => 'Unauthorized User Request'
                );
                return response()->json($error_array);

            }


        } catch (\Exception $e) {

            $error_array = array(
                'status' => 'error',
                'message' => 'Sorry, something went wrong...'
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
                    'message' => 'Card has been removed from your wishlist'
                );
                return response()->json($res);

            } else {
                $error_array = array(
                    'status' => 'error',
                    'message' => 'Invalid Parameter'
                );
                return response()->json($error_array);
            }

        } catch (\Exception $e) {

            $error_array = array(
                'status' => 'error',
                'message' => 'Sorry, something went wrong...'
            );
            return response()->json($error_array);
        }
    }
}
