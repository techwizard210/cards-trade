<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;

use App\Models\CardUpload;
use App\Models\OrderList;
use Auth;
use Session;

class UploadController extends Controller {
    // Upload Page

    //     public function store( Request $request )
    // {
    //         $this->validate( $request, [
    //             'filename' => 'required',
    //             'filename.*' => 'images|mimes:jpeg,png,jpg,git,svg|max:2048'
    // ] );
    //         if ( $request->hasFile( 'filename' ) )
    // {
    //             foreach ( $request->file( 'filename' ) as $image )
    // {
    //                 $name = $image->getClientOriginalName();
    //                 echo $name;
    //                 $image->move( public_path().'/image/', $name );
    //                 $data[] = $name;
    //             }
    //         }
    //         if ( $request->hasFile( 'front-photo' ) &&  $request->hasFile( 'back-photo' ))
    // {
    //                 $frontname = $request->file( 'front-photo' )->getClientOriginalName();
    //                 $backname = $request->file( 'back-photo' )->getClientOriginalName();
    //                 $request->file( 'front-photo' )->move( public_path().'/image/', $frontname );
    //                 $request->file( 'back-photo' )->move( public_path().'/image/', $backname );
    //             }
    //             echo $frontname;
    //             echo $backname;
    //         $Upload_model = new CardUpload;
    //         $Upload_model->frontPhoto = $frontname;
    //         $Upload_model->backPhoto = $backname;
    //         $Upload_model->receipt = $frontname;
    //         $Upload_model->save();
    //         // return back()->with( 'success', 'Your images has been successfully' );
    //     }

    public function store( Request $request ) {
        $cardNum = $request->card_num;
        $cardPin = $request->card_pin;
        $cardExpiry = $request->card_expiry;
        $frontCard = 'https://cardstrade.com/images/frontCard';
        $BackCard = 'https://cardstrade.com/images/BackCard';

        $order = new OrderList;
        $order->user_id = Auth::user()->id;
        $order->gateway = 0;
        $order->amount = 0;
        $order->card_num = $cardNum;
        $order->card_pin = $cardPin;
        $order->status = 11;
        $order->offer_id = Session::get('offerId');
        $order->save();

        $title = 'Orders';
        // $orders = OrderList::where( 'user_id', Auth::user()->id )::with('offer')->get();
        $orders = OrderList::with('offer')->first();
        echo $orders;
        $data[ 'orders' ] = $orders;
        // return redirect()->route('account.orders');

        // $mailHost = env("MAIL_HOST","");
        // $mailUsername = env("MAIL_USERNAME","");
        // $data = array("a"=>"b");
        // Mail::to("challengedev210@gmail.com")->send($data);
        // Mail::send(['text'=>'mail'], $data, function($message) {
        //  $message->to('challengedev210@gmail.com', 'Tutorials Point')->subject
        //     ('Laravel Basic Testing Mail');
        // //  $message->from("{$mailHost}","{$mailUsername}");
        // //  $message->from("server311.web-hosting.com","support@cardstrade.com");
        // });
        // $objDemo = new \stdClass();
        // $objDemo->frontCard = 'https://cardstrade.com/images/frontCard';
        // $objDemo->backCard = 'https://cardstrade.com/images/BackCard';
        // $objDemo->receipt = 'https://cardstrade.com/images/Receipt';

        // Mail::to("challengedev210@gmail.com")->send(new DemoEmail($objDemo));
    }
}
