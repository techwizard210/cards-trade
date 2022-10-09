@extends('frontend.layout.app')

@section('content')

<div class="intro-slider slide-animate owl-carousel owl-theme show-nav-hover nav-inside nav-big"
    data-owl-options="{
    'loop': false,
    'dots': false,
    'nav': true
}">
    @foreach ($banners as $index => $list)
    <div class="banner intro-slide{{ $index + 1 }}" style="background: url({{ asset('assets/images/slider/slide'.( $index % 2 == 0 ? '1' : '2').'.jpg') }}) rgb(255, 255, 255);
    min-height: 530px; background-position: {{ $index % 2 == 0 ? 'right' : 'left' }} center; background-repeat: no-repeat;">
        <div class="container">
            <div class="wrapper">
                <svg class="custom-svg-{{ $index % 2 == 0 ? '1' : '2' }}" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 649 578">
                    <path fill="#FFF"
                        d="M-225.5,154.7l358.45,456.96c7.71,9.83,21.92,11.54,31.75,3.84l456.96-358.45c9.83-7.71,11.54-21.92,3.84-31.75
                        L267.05-231.66c-7.71-9.83-21.92-11.54-31.75-3.84l-456.96,358.45C-231.49,130.66-233.2,144.87-225.5,154.7z">
                    </path>
                    <path class="appear-animate appear-animate-svg" data-animation-name="customLineAnim"
                        data-animation-duration="5000" fill="none" stroke="#222529" stroke-width="1.5"
                        stroke-miterlimit="10"
                        d="M416-21l202.27,292.91c5.42,7.85,3.63,18.59-4.05,24.25L198,603"
                        style="animation-delay: 300ms; animation-duration: 5s;"></path>
                </svg>
            </div>
            @if($index % 2 == 0)
            <div class="row h-100">
                <div class="col-md-5 banner-media appear-animate d-none d-md-block"
                    data-animation-name="fadeInRightShorter">
                    <img src="{{ asset('storage/banners/'.$list->photo) }}" width="426" height="426"
                        alt="banner" />
                    <div class="mark-deal"><i>%
                            Deal</i></div>
                </div>
                <div class="col-md-7">
                    <div class="banner-content banner-layer-middle">
                        <div class=" appear-animate" data-animation-name="fadeInLeftShorter"
                            data-animation-delay="500">
                            <div class="brand-logo px-3 mb-1">
                                <img src="{{ asset('assets/images/demoes/demo42/new_brand3_light.png') }}" width="140"
                                    height="60" alt="brand" />
                            </div>
                            <h3 class="banner-subtitle pt-1 mb-1">{{ $list->subtitle }}</h3>
                            <h2 class="banner-title pb-1">{{ $list->title }}</h2>

                            <ul class="info-list">
                                <li><i class="far fa-check-circle"></i>
                                    <div class="porto-info-list-item-desc">{{ $list->desc1 }}
                                    </div>
                                </li>
                                <li><i class="far fa-check-circle"></i>
                                    <div class="porto-info-list-item-desc">{{ $list->desc2 }}
                                    </div>
                                </li>
                                <li><i class="far fa-check-circle"></i>
                                    <div class="porto-info-list-item-desc">{{ $list->desc3 }}
                                    </div>
                                </li>
                            </ul>
                            <h5 class="text-price align-top align-left">
                                {{ __('label.starting_at') }} <strong class="font-weight-bold"> {{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency($list->price), 2) }}</strong></h5>
                            <div class="banner-action">
                                <a href="{{ route('products', app()->getLocale()) }}" class="btn btn-primary btn-rounded btn-icon-right" role="button">
                                    {{ __('title.buttons.shop_now') }} <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="row h-100">
                <div class="col-md-7">
                    <div class="banner-content banner-layer-middle text-right">
                        <div class=" appear-animate" data-animation-name="fadeInRightShorter"
                            data-animation-delay="500">
                            <div class="brand-logo px-3 mb-1">
                                <img src="{{ asset('assets/images/demoes/demo42/new_brand3_light.png') }}" width="140"
                                    height="60" alt="brand" />
                            </div>
                            <h3 class="banner-subtitle pt-1 mb-1">{{ $list->subtitle }}</h3>
                            <h2 class="banner-title pb-1">{{ $list->title }}</h2>

                            <h5 class="text-price align-top align-left">
                                {{ __('label.starting_at') }} <strong class="font-weight-bold"> {{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency($list->price), 2) }}</strong></h5>

                            <ul class="info-list mr-0">
                                <li><i class="far fa-check-circle"></i>
                                    <div class="porto-info-list-item-desc">{{ $list->desc1 }}
                                    </div>
                                </li>
                                <li><i class="far fa-check-circle"></i>
                                    <div class="porto-info-list-item-desc">{{ $list->desc2 }}
                                    </div>
                                </li>
                                <li><i class="far fa-check-circle"></i>
                                    <div class="porto-info-list-item-desc">{{ $list->desc3 }}
                                    </div>
                                </li>
                            </ul>

                            <div class="banner-action">
                                <a href="{{ route('products', app()->getLocale()) }}" class="btn btn-primary btn-rounded btn-icon-right" role="button">
                                    {{ __('title.buttons.shop_now') }} <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 banner-media appear-animate d-none d-md-block"
                    data-animation-name="fadeInLeftShorter">
                    <img src="{{ asset('storage/banners/'.$list->photo) }}" width="504" height="347"
                        alt="banner" />
                    <div class="mark-deal"><i>% Deal</i></div>
                </div>

            </div>
            @endif
        </div>
    </div>

    @endforeach

</div>

<section class="search-section" style="background-color: #f4f4f4;">
    <div class="info-boxes-container appear-animate animated fadeInUpShorter appear-animation-visible" data-animation-name="fadeInUpShorter" data-animation-delay="200" style="animation-duration: 1000ms;">
        <div class="row m-0">
            <div class="info-box info-box-icon-left col-md-3">
                <i class="icon-gift-2"></i>
                <div class="info-box-content">
                    <h4 class="ls-n-25 text-upppercase">{{ __('label.high_quality') }}</h4>
                    <p class="font2 font-weight-light">{{ __('message.home.intro_msg1') }}</p>
                </div>
            </div>
            <div class="info-box info-box-icon-left col-md-3">
                <i class="icon-shipping"></i>
                <div class="info-box-content">
                    <h4 class="ls-n-25">{{ __('label.free_shipping_return') }}</h4>
                    <p class="font2 font-weight-light">{{ __('message.home.intro_msg2') }} CHF 250.00</p>
                </div>
            </div>
            <div class="info-box info-box-icon-left col-md-3">
                <i class="icon-money"></i>
                <div class="info-box-content">
                    <h4 class="ls-n-25">{{ __('label.money_back') }}</h4>
                    <p class="font2 font-weight-light">{{ __('message.home.intro_msg3') }}</p>
                </div>
            </div>
            <div class="info-box info-box-icon-left col-md-3">
                <i class="icon-support"></i>
                <div class="info-box-content">
                    <h4 class="ls-n-25">{{ __('label.online_support') }} 24/7</h4>
                    <p class="font2 font-weight-light">Whatsapp {{ Helper::getCommonSetting('company_whatsapp') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Shop Category -->
<section class="category-section">
    <div class="container">
        <div class="d-lg-flex align-items-center appear-animate" data-animation-name="fadeInLeftShorter">
            <h2 class="title title-underline divider">{{ __('title.shop_categories') }}</h2>
            <a href="{{ route('products', app()->getLocale()) }}" class="sicon-title text-uppercase">{{ __('title.buttons.view_all') }}<i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="row grid appear-animate animated fadeInUpShorter appear-animation-visible" data-animation-name="fadeInUpShorter" data-animation-delay="400" style="position: relative; height: 601px; animation-duration: 1000ms;">
            <div class="grid-item col-sm-6 col-md-4 height-3-5" style="position: absolute; left: 0%; top: 0px;">
                <div class="product-category" style="background-color: #f4f4f2;">
                    <a href="{{ route('products', app()->getLocale()) }}">
                        <figure>
                            <img src="{{ asset('assets/images/categories/contact_lens.jpg') }}" alt="src" width="264" height="345">
                        </figure>
                    </a>
                    <div class="category-content">
                        <ul class="sub-categories">
                            @foreach($cat_colored_lens as $list)
                            <li><a href="{{ route('products', app()->getLocale()) }}">{{ $list->title }}</a></li>
                            @endforeach
                        </ul>

                        <h3><a href="{{ route('products', app()->getLocale()) }}">{{ __('title.colored_contact_lens') }}</a></h3>
                    </div>
                </div>
            </div>
            <div class="grid-item col-sm-6 col-md-5 height-5-5" style="position: absolute; left: 25%; top: 0px;">
                <div class="product-category" style="background-color: #f4f4f2;">
                    <a href="{{ route('products', app()->getLocale()) }}">
                        <figure>
                            <img src="{{ asset('assets/images/categories/glasses.jpg') }}" alt="src" width="550" height="564">
                        </figure>
                    </a>
                    <div class="category-content">
                        <ul class="sub-categories">
                            @foreach($cat_glasses as $list)
                            <li><a href="{{ route('products', app()->getLocale()) }}">{{ $list->title }}</a></li>
                            @endforeach
                        </ul>
                        <h3><a href="{{ route('products', app()->getLocale()) }}">{{ __('title.glasses') }}</a></h3>
                    </div>
                </div>
            </div>
            <div class="grid-item col-sm-6 col-md-3 height-2-5" style="position: absolute; left: 75%; top: 240px;">
                <div class="product-category" style="background-color: #f4f4f2;">
                    <a href="{{ route('products', app()->getLocale()) }}">
                        <figure>
                            <img src="{{ asset('assets/images/categories/sunglasses.jpg') }}" alt="src" width="264" height="345">
                        </figure>
                    </a>
                    <div class="category-content">
                        <ul class="sub-categories">
                            @foreach ($cat_sunglasses as $list)
                            <li><a href="{{ route('products', app()->getLocale()) }}">{{ $list->title }}</a></li>
                            @endforeach
                        </ul>

                        <h3><a href="{{ route('products', app()->getLocale()) }}">{{ __('title.sunglasses') }}</a></h3>
                    </div>
                </div>
            </div>
            <div class="grid-item col-sm-6 col-md-3 height-3-5" style="position: absolute; left: 75%; top: 240px;">
                <div class="product-category" style="background-color: #f4f4f2;">
                    <a href="{{ route('products', app()->getLocale()) }}">
                        <figure>
                            <img src="{{ asset('assets/images/categories/trans_lens.jpg') }}" alt="src" width="264" height="345">
                        </figure>
                    </a>
                    <div class="category-content">
                        <ul class="sub-categories">
                            @foreach($cat_trans_lens as $list)
                            <li><a href="{{ route('products', app()->getLocale()) }}">{{ $list->title }}</a></li>
                            @endforeach
                        </ul>

                        <h3><a href="{{ route('products', app()->getLocale()) }}">{{ __('title.transparent_lens') }}</a></h3>
                    </div>
                </div>
            </div>

            <div class="grid-item col-sm-6 col-md-4 height-2-5" style="position: absolute; left: 0%; top: 360px;">
                <div class="product-category" style="background-color: #f4f4f4">
                    <a href="{{ route('products', app()->getLocale()) }}">
                        <figure>
                            <img src="{{ asset('assets/images/categories/accessories.jpg') }}" alt="src" width="264" height="199">
                        </figure>
                    </a>
                    <div class="category-content">
                        <ul class="sub-categories">
                            @foreach ($cat_accessories as $list)
                            <li><a href="{{ route('products', app()->getLocale()) }}">{{ $list->title }}</a></li>
                            @endforeach
                        </ul>

                        <h3><a href="{{ route('products', app()->getLocale()) }}">{{ __('title.accessories') }}</a></h3>
                    </div>
                </div>
            </div>

            <div class="grid-col-sizer col-1" style="position: absolute; left: 0%; top: 600px;"></div>
        </div>
    </div>
</section>
<!-- Shop Category -->

<!-- Hot Deals -->
<section class="product-section1" style="background-color: #f4f4f4;">
    <div class="container">
        <h2 class="title title-underline pb-1 appear-animate" data-animation-name="fadeInLeftShorter">{{ __('title.hot_deals') }}</h2>
        <div class="owl-carousel owl-theme appear-animate" data-owl-options="{
        'loop': false,
        'dots': false,
        'nav': true,
        'margin': 20,
        'responsive': {
            '0': {
                'items': 2
            },
            '576': {
                'items': 4
            },
            '991': {
                'items': 6
            }
        }
    }">
            @each('frontend.component.product-div', $hot_products, 'product')
        </div>
    </div>
</section>
<!-- Hot Deals -->

<!-- Special Offers -->
<section class="product-section2 container" id="special-offer-div">
    <div class="row">
        <div class="col-md-4 appear-animate" data-animation-name="fadeInLeftShorter">
            <h3 class="custom-title">{{ __('title.special_offers') }}</h3>
            <div class="owl-carousel owl-theme dots-simple">
                <div class="banner banner1"
                    style="background: url({{ asset('assets/images/banner/banner1.jpg') }}) rgb(232, 127, 59);
                background-position: center; background-size: cover; background-repeat: no-repeat; min-height: 40.2rem;">
                    <div class="banner-content banner-layer-middle position-absolute">

                        <img src="{{ asset('assets/images/logo-black.png') }}" width="232" height="28" alt="brand" />
                        <h3 class="banner-subtitle text-uppercase text-white">{{ __('title.contact_lens') }}</h3>
                        <h2 class="banner-title text-uppercase text-white font-weight-bold">
                            {{ __('message.starting') }}<br>{{ __('message.at') }} <sup>CHF</sup>99<sup>99</sup>
                        </h2>
                        <p class="banner-desc text-white">{{ __('message.home.start_shopping_right_now') }}</p>
                        <a href="{{ route('products', app()->getLocale()) }}" class="btn btn-dark btn-rounded btn-icon-right ls-25" role="button">
                            {{ __('title.buttons.shop_now') }} <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="banner banner2"
                    style="background: url({{ asset('assets/images/banner/banner2.jpg') }}) rgb(83, 86, 91);
                background-position: center; background-size: cover; background-repeat: no-repeat; min-height: 40.2rem;">
                    <div class="banner-content banner-layer-middle position-absolute">

                        <img src="{{ asset('assets/images/logo-white.png') }}" width="232" height="28" alt="brand" />
                        <h3 class="banner-subtitle text-uppercase text-white">{{ __('title.glasses') }}</h3>
                        <h2 class="banner-title text-uppercase text-white font-weight-bold">
                            {{ __('message.starting') }}<br>{{ __('message.at') }} <sup>CHF</sup>99<sup>99</sup>
                        </h2>
                        <p class="banner-desc text-white">{{ __('message.home.start_shopping_right_now') }}</p>
                        <a href="{{ route('products', app()->getLocale()) }}" class="btn btn-primary btn-rounded btn-icon-right ls-25" role="button">
                            {{ __('title.buttons.shop_now') }} <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 appear-animate" data-animation-name="fadeInLeftShorter"
            data-animation-delay="200">
            <div class="d-lg-flex align-items-center">
                <h3 class="custom-title divider">{{ __('label.featured') }}</h3>
                <a href="{{ route('products', app()->getLocale()) }}" class="sicon-title">{{ __('title.buttons.view_all') }}<i class="fas fa-arrow-right"></i></a>
            </div>
            @each('frontend.component.product-div-left', $featured, 'product')
        </div>
        <div class="col-md-4 appear-animate" data-animation-name="fadeInLeftShorter"
            data-animation-delay="400">
            <div class="d-lg-flex align-items-center">
                <h3 class="custom-title divider">{{ __('label.customer_favourites') }}</h3>
                <a href="{{ route('products', app()->getLocale()) }}" class="sicon-title">{{ __('title.buttons.view_all') }}<i class="fas fa-arrow-right"></i></a>
            </div>
            @each('frontend.component.product-div-left', $fav_products, 'product')
        </div>
    </div>
</section>
<!-- Special Offers -->

<!-- Shop by Brand -->
<section class="brand-section appear-animate" style="background-color: #f4f4f4;">
    <div class="container">
        <h2 class="title title-underline pb-1 appear-animate" data-animation-name="fadeInLeftShorter">{{ __('label.shop_by_brand') }}</h2>
        <div class="owl-carousel owl-theme nav-big nav-outer appear-animate" data-owl-options="{
            'loop': false,
            'dots': false,
            'nav': true,
            'margin': 20,
            'responsive': {
                '0': {
                    'items': 1
                },
                '750': {
                    'items': 2
                }
            }
        }">
            @foreach($brands_data as $list)
            <div class="brand-box">
                <div class="brand-name">
                    <h3>{{ $list->title }}:</h3>
                    <img src="{{ asset('brands/'.$list->brand_logo) }}" width="140" height="60" alt="{{ $list->title }}" />
                </div>
                <div class="shop-products owl-carousel owl-theme dots-simple" data-owl-options="{
                    'loop': false,
                    'dots': true,
                    'nav': false,
                    'items': 2,
                    'margin': 30
                }">
                    @each('frontend.component.product-div', $list->products, 'product')
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Shop by Brand -->

<!-- Send Us a Message -->
<section class="call-section appear-animate" style="background-color: #212529;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h4 class="text-white text-uppercase">{{ __('message.home.contact_us_msg_3') }}</h4>
                <h2 class="text-white">{{ __('message.home.contact_us_msg_2') }}</h2>
                <h3>{{ __('message.home.contact_us_msg_1') }}</h3>
            </div>
            <div class="col-lg-5 call-action">
                <div class="d-inline-flex align-items-center text-left divider">
                    <i class="icon-phone-1 text-white mr-2"></i>
                    <h6 class="pt-1 line-height-1 text-uppercase text-white">{{ __('label.call_us_now') }}<a href="tel:{{ Helper::getCommonSetting('company_contact_phone') }}"
                            class="d-block text-white ls-10 pt-2">{{ Helper::getCommonSetting('company_contact_phone') }}</a></h6>
                </div>
                <a href="{{ route('contact-us', app()->getLocale()) }}" class="btn btn-borders btn-rounded btn-outline-white ls-25">{{ __('title.contact_us') }}</a>
            </div>
        </div>
    </div>
    <svg class="custom-svg-3 appear-animate" data-animation-name="fadeIn" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 649 578">
        <path fill="#f26100" d="M-225.5,154.7l358.45,456.96c7.71,9.83,21.92,11.54,31.75,3.84l456.96-358.45c9.83-7.71,11.54-21.92,3.84-31.75
            L267.05-231.66c-7.71-9.83-21.92-11.54-31.75-3.84l-456.96,358.45C-231.49,130.66-233.2,144.87-225.5,154.7z">
        </path>
        <path class="appear-animate appear-animate-svg" data-animation-name="customLineAnim"
            data-animation-delay="300" data-animation-duration="5000" fill="none" stroke="#FFF"
            stroke-width="1.5" stroke-miterlimit="10" d="M416-21l202.27,292.91c5.42,7.85,3.63,18.59-4.05,24.25L198,603">
        </path>
    </svg>
</section>
<!-- Send Us a Message -->

<!-- Recently Arrived -->
<section class="product-section1 recently">
    <div class="container">
        <h2 class="title title-underline pb-1 appear-animate" data-animation-name="fadeInLeftShorter">{{ __('label.recently_arrived') }}</h2>
        <div class="owl-carousel owl-theme appear-animate" data-owl-options="{
            'loop': false,
            'dots': false,
            'nav': true,
            'margin': 20,
            'responsive': {
                '0': {
                    'items': 2
                },
                '576': {
                    'items': 4
                },
                '991': {
                    'items': 6
                }
            }
        }">
            @each('frontend.component.product-div', $recent_products, 'product')
        </div>
    </div>
</section>
<!-- Recently Arrived -->

@endsection

