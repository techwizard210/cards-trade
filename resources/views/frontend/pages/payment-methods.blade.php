@extends('frontend.layout.app')

@section('content')

<div class="page-header" style="background: no-repeat 60%/cover url({{ asset('assets/images/elements/policy-header.jpg') }});">
    <div class="container d-flex flex-column align-items-center">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb" style="color: #222529;">
                    <li class="breadcrumb-item"><a href="{{ route('home', app()->getLocale()) }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('title.payment_methods') }}</li>
                </ol>
            </div>
        </nav>
        <h1>{{ __('title.payment_methods') }}</h1>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="big_title mb-3 mt-4">
            <h1 class="mb-0 text-uppercase" style="font-weight: 900; font-size: 45px;">ELEGANCE  {{ __('title.payment_methods') }}</h1>
            <h3>{{ __('title.payment_methods') }}</h3>
            <a class="buying_guide_continue" href="{{ route('products', app()->getLocale()) }}">{{ __('title.buttons.continue_shopping') }}</a>
        </div>
        <div class="clear"></div>
        <div class="about_content about_content_2">
            <h4>ACCEPTED PAYMENT METHODS</h4>
            <P>ELEGANCE Switzerland currently accepts American Express, Mastercard, Visa, Klarna, Apple Pay and Paypal through the Internet and Telesales. Please note that we accept international credit cards.</P>
            <br>
            <img src="{{ asset('backend/img/payment-method.png')}}" alt="#" style="margin: 0 auto;">
            <h5>AUTHORIZING YOUR CREDIT CARD</h5>
            <P>It is not uncommon for a request for credit card authorization to fail once or twice before the card is finally authorized. We will send you an e-mail if we experience difficulties in authorizing your credit card.</P>
            <br>
        </div>
    </div>
    <div class="clear"></div>
</div>

@endsection
