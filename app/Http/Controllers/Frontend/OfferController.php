<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Merchant;
use App\Models\Product;
use App\Models\Category;
use App\Models\offers;
use App\Models\Gateways;

use Helper;
use Lang;
use Auth;
use Session;

class OfferController extends Controller {
    // Offer Page

    public function offer() {
        $selectId = $_GET[ 'cardId' ];
        $price = $_GET[ 'price' ];
        if ( !empty( $_GET[ 'gatewayId' ] ) ) {
            $gatewayId = $_GET[ 'gatewayId' ];
        }
        $data[ 'gateways' ] = Gateways::all();
        $data[ 'merchants' ] = Merchant::all();
        $data[ 'price' ] = $price;
        $data[ 'selectId' ] = $selectId;
        if ( !empty( $gatewayId ) ) {
            $data[ 'offers' ] = offers::where( 'card', $selectId )->where( 'gateway', $gatewayId )->where( 'price', '>=', 70 )->where( 'price', '<=', 85 )->limit( 5 )->get();
            return view( 'frontend.offer', $data );
        }
        $allOffers = offers::where( 'card', $selectId )->where( 'price', '>=', 70 )->where( 'price', '<=', 85 )->get();
        $data[ 'offerCount' ] = $allOffers->count();
        $data[ 'offers' ] = offers::where( 'card', $selectId )->where( 'price', '>=', 70 )->where( 'price', '<=', 85 )->limit( 5 )->get();
        return view( 'frontend.offer', $data );
    }

    public function moreOffer( Request $request ) {
        $offers = offers::where( 'card', $request->get( 'cardId' ) )->where( 'price', '>=', 70 )->where( 'price', '<=', 85 )->skip( 5 * $request->get( 'index' ) )->take( 5 )->get();
        $res = array(
            'price' => $request->get( 'price' ),
            'offers' => $offers
        );
        return response()->json( $res );
    }

    public function reOffer( Request $request ) {
        $offers = offers::where( 'card', $request->get( 'cardId' ) )->where( 'gateway', $request->get( 'gatewayId' ) )->where( 'price', '>=', 70 )->where( 'price', '<=', 85 )->limit( 5 )->get();
        $res = array(
            'price' => $request->get( 'price' ),
            'offers' => $offers
        );
        return response()->json( $res );
    }

    public function gateway() {
        $offerId = $_GET[ 'offerId' ];
        Session::put( 'offerId', $offerId );
        // if ()
        if ( !empty( Auth::id() ) ) {
            $offer = offers::where( 'id', $offerId )->get();
            $data[ 'offer' ] = $offer;
            return view( 'frontend.gateway', $data );
        } else {
            return redirect()->route( 'login' );
        }
    }

    public function cardDetail() {
        $identity = $_GET[ 'identity' ];
        return view( 'frontend.card-detail' );
    }

    public function submitCard() {
        return view( 'frontend.index' );
    }

}
