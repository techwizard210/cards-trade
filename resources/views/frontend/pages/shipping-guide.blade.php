@extends('frontend.layout.app')

@section('content')

<div class="page-header" style="background: no-repeat 60%/cover url({{ asset('assets/images/elements/policy-header.jpg') }});">
    <div class="container d-flex flex-column align-items-center">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb" style="color: #222529;">
                    <li class="breadcrumb-item"><a href="{{ route('home', app()->getLocale()) }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('title.shipping_guide') }}</li>
                </ol>
            </div>
        </nav>
        <h1>{{ __('title.shipping_guide') }}</h1>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="big_title mb-3 mt-4">
            <h1 class="mb-0 text-uppercase" style="font-weight: 900; font-size: 45px;">ELEGANCE  {{ __('title.shipping_guide') }}</h1>
            <h3>{{ __('title.shipping_guide') }}</h3>
            <a class="buying_guide_continue" href="{{ route('products', app()->getLocale()) }}">{{ __('title.buttons.continue_shopping') }}</a>
        </div>
        <div class="clear"></div>
        <div class="about_content about_content_2">
            <h5>Delivery Time</h5>
            <P>- All stock products are shipped within 24 hours*</P>
            <P>- Special items: We deliver these items within 7-10 working days</P>
            <P>- Out of Stock: This item will be in your mailbox within 7-14 business days.</P>
            <P>* If you order by 4 p.m., the goods will be in your mailbox the next day.</P>
            <P>Special items are contact lenses for astigmatism. We have to order these from the manufacturer. Delivery time is approx. 7-14 working days.</P>
            <P>* Delays may still occur due to logistical reasons that are beyond our control. We ask for your understanding.</P>
            <br>
            <h5>Express Delivery</h5>
            <P>Saturday / Sunday between 11am to 2am</P>
            <P>Monday to Friday between 8 p.m. and 2 a.m</P>
            <P>Orders must be placed by 5pm confirming that the goods are in stock.</P>
            <P>CHF 1.50 per KM will be charged and must be paid in advance or in cash.</P>
            <P>Delivery takes place from 8953 Dietikon and max. within a radius of 100km</P>
            <P>Minimum quantity surcharge up to 20KM is: 10.00 CHF</P>
            <br>
            <h5>Express Delivery Over Night</h5>
            <P>7 days a week by  8:00 a.m. in your mailbox</P>
            <P>Orders must be placed by 5pm confirming that the goods are in stock.</P>
            <P>CHF 1.00 per KM will be charged and must be paid in advance or in cash.</P>
            <P>Delivery takes place from 8953 Dietikon and max. within a radius of 100km</P>
            <P>Minimum quantity surcharge up to 20KM is: 10.00 CHF</P>
        </div>
    </div>
    <div class="clear"></div>
</div>

@endsection
