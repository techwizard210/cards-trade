<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Lang;
use Newsletter;
use DB;

class FrontendController extends Controller
{
    /* Render Home Page */
    public function index()
    {
        $title = 'Home';
        $data = array();
        return view('frontend.index', $data)->withTitle($title);
    }

    /* Render About Us Page */
    public function aboutUs()
    {
        $title = 'About Us';
        return view('frontend.about-us')->withTitle($title);
    }

    /* Render Contact Us Page */
    public function contactUs()
    {
        $title = 'Contact Us';
        return view('frontend.contact-us')->withTitle($title);
    }

    /* Ajax Subscribe Email */
    public function subscribe(Request $request)
    {
        if(! Newsletter::isSubscribed($request->email)) {

            Newsletter::subscribePending($request->email);

            if(Newsletter::lastActionSucceeded())
            {
                $arr = array(
                    'status' => 'success',
                    'message' => Lang::get('message.response.newsletter_success')
                );
                return response()->json($arr);
            }
            else
            {
                $arr = array(
                    'status' => 'error',
                    'message' => Newsletter::getLastError()
                );
                return response()->json($arr);
            }
        }
        else {
            $arr = array(
                'status' => 'error',
                'message' => Lang::get('message.response.newsletter_exist')
            );
            return response()->json($arr);
        }
    }

    /* Get Contact Us Msg */
    public function contactUsMsg(Request $request)
    {
        try {
            $res = DB::table('inquiry')->insertGetId([
                'inquiry_type' => $request->contact_subject,
                'inquiry_content' => $request->contact_message,
                'inquiry_email' => $request->contact_email,
                'inquiry_name' => $request->contact_name,
                'inquiry_date' => date('Y-m-d H:s:i')
            ]);

            if($res) return back()->with('message', Lang::get('message.response.request_success'));
            else return back()->withErrors(Lang::get('message.response.something_wrong'))->withInput();

        } catch (\Exception $e) {

            return back()->withErrors(Lang::get('message.response.something_wrong'))->withInput();

        }
    }
}
