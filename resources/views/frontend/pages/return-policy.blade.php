@extends('frontend.layout.app')

@section('content')

<div class="page-header" style="background: no-repeat 60%/cover url({{ asset('assets/images/elements/policy-header.jpg') }});">
    <div class="container d-flex flex-column align-items-center">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb" style="color: #222529;">
                    <li class="breadcrumb-item"><a href="{{ route('home', app()->getLocale()) }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('title.return_policy') }}</li>
                </ol>
            </div>
        </nav>
        <h1>{{ __('title.return_policy') }}</h1>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="big_title mb-3 mt-4">
            <h1 class="mb-0 text-uppercase" style="font-weight: 900; font-size: 45px;">ELEGANCE  {{ __('title.return_policy') }}</h1>
            <h3>{{ __('title.return_policy') }}</h3>
            <a class="buying_guide_continue" href="{{ route('products', app()->getLocale()) }}">{{ __('title.buttons.continue_shopping') }}</a>
        </div>
        <div class="clear"></div>
        <div class="about_content about_content_2">
            <ul>
                <li><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Right of revocation and withdrawal</font></font></strong>
                <ol>
                <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Customers can revoke the purchase contract within 7 days without giving a reason and without paying a penalty. </font><font style="vertical-align: inherit;">The period for exercising this right begins on the day the goods arrive at the consumer. </font><font style="vertical-align: inherit;">The customer can return goods that have already been delivered at his own expense. </font><font style="vertical-align: inherit;">Payments already made will be refunded by the provider minus shipping costs</font></font></li>
                <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">If a customer withdraws from the purchase due to defects in the goods or other reasons for which the provider is responsible, the provider will refund any amounts already paid.</font></font></li>
                </ol>
                </li>
                <li><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">refund policy</font></font></strong>
                <ol>
                <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">You have an unlimited right to return the entire delivery within 7 days of the delivery date. </font><font style="vertical-align: inherit;">This refers to the entire delivery and all goods received. </font><font style="vertical-align: inherit;">The goods must be returned to the sender of the delivery (usually elegance-linsen.ch) in unused, unchanged condition in undamaged packaging. </font><font style="vertical-align: inherit;">In the case of hidden defects, these must be reported in writing, otherwise no credit or replacement delivery can be made. </font><font style="vertical-align: inherit;">A claim for a credit arises.</font></font></li>
                </ol>
                </li>
            </ul>
        </div>
    </div>
    <div class="clear"></div>
</div>

@endsection
