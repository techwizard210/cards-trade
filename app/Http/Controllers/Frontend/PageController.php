<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Lang;
use Newsletter;
use DB;

class PageController extends Controller
{
    /* Render Terms & Conditions Page */
    public function terms()
    {
        $title = Lang::get('title.terms_and_conditions');
        return view('frontend.pages.terms')->withTitle($title);
    }

    /* Render Privacy Policy Page */
    public function privacy_policy()
    {
        $title = Lang::get('title.privacy_policy');
        return view('frontend.pages.privacy-policy')->withTitle($title);
    }

    /* Render Return Policy Page */
    public function return_policy()
    {
        $title = Lang::get('title.return_policy');
        return view('frontend.pages.return-policy')->withTitle($title);
    }

    /* Render Shipping Guide Page */
    public function shipping_guide()
    {
        $title = Lang::get('title.shipping_guide');
        return view('frontend.pages.shipping-guide')->withTitle($title);
    }

    /* Render Payment Methods Page */
    public function payment_methods()
    {
        $title = Lang::get('title.payment_methods');
        return view('frontend.pages.payment-methods')->withTitle($title);
    }

    /* Render FAQ Page */
    public function faq()
    {
        $title = 'FAQ';
        return view('frontend.pages.faq')->withTitle($title);
    }
}
