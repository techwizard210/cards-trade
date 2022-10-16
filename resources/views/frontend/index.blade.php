@extends('frontend.layout.app')

@section('content')

<main class="main">
    <section class="intro-section">
        <div class="swiper-container swiper-theme nav-inner pg-inner swiper-nav-lg animation-slider pg-xxl-hide nav-xxl-show nav-hide"
            data-swiper-options="{
            'slidesPerView': 1,
            'autoplay': {
                'delay': 8000,
                'disableOnInteraction': false
            }
        }">
            <div class="swiper-wrapper">
                <div class="swiper-slide banner banner-fixed intro-slide intro-slide1"
                    style="background-image: url({{ asset('user-assets/images/sliders/slide-1.jpg') }}); background-color: #ebeef2;">
                    <div class="container">
                        <figure class="slide-image skrollable slide-animate">
                            <img src="{{ asset('user-assets/images/sliders/shoes.png') }}" alt="Banner"
                                data-bottom-top="transform: translateY(10vh);"
                                data-top-bottom="transform: translateY(-10vh);" width="474" height="397">
                        </figure>
                        <div class="banner-content y-50 text-right">
                            <h5 class="banner-subtitle font-weight-normal text-default ls-50 lh-1 mb-2 slide-animate"
                                data-animation-options="{
                            'name': 'fadeInRightShorter',
                            'duration': '1s',
                            'delay': '.2s'
                        }">
                                High <span class="p-relative d-inline-block">Price</span>
                            </h5>
                            <h3 class="banner-title font-weight-bolder ls-25 lh-1 slide-animate"
                                data-animation-options="{
                            'name': 'fadeInRightShorter',
                            'duration': '1s',
                            'delay': '.4s'
                        }">
                                GIFT CARDS
                            </h3>
                            <p class="font-weight-normal text-default slide-animate" data-animation-options="{
                            'name': 'fadeInRightShorter',
                            'duration': '1s',
                            'delay': '.6s'
                        }">
                                Sale up to <span class="font-weight-bolder text-secondary">30% OFF</span>
                            </p>

                            <a href="{{ route('buy') }}"
                                class="btn btn-dark btn-outline btn-rounded btn-icon-right slide-animate"
                                data-animation-options="{
                            'name': 'fadeInRightShorter',
                            'duration': '1s',
                            'delay': '.8s'
                        }">SHOP NOW<i class="w-icon-long-arrow-right"></i></a>

                        </div>
                        <!-- End of .banner-content -->
                    </div>
                    <!-- End of .container -->
                </div>
                <!-- End of .intro-slide1 -->

                <div class="swiper-slide banner banner-fixed intro-slide intro-slide2"
                    style="background-image: url({{ asset('user-assets/images/sliders/slide-2.jpg') }}); background-color: #ebeef2;">
                    <div class="container">
                        <figure class="slide-image skrollable slide-animate" data-animation-options="{
                            'name': 'fadeInUpShorter',
                            'duration': '1s'
                        }">
                            <img src="{{ asset('user-assets/images/sliders/men.png') }}" alt="Banner"
                                data-bottom-top="transform: translateX(10vh);"
                                data-top-bottom="transform: translateX(-10vh);" width="480" height="633">
                        </figure>
                        <div class="banner-content d-inline-block y-50">
                            <h5 class="banner-subtitle font-weight-normal text-default ls-50 slide-animate"
                                data-animation-options="{
                                'name': 'fadeInUpShorter',
                                'duration': '1s',
                                'delay': '.2s'
                            }">
                                Your <span class="text-secondary">Little Bank</span>
                            </h5>
                            <h3 class="banner-title font-weight-bolder text-dark mb-0 ls-25 slide-animate"
                                data-animation-options="{
                                'name': 'fadeInUpShorter',
                                'duration': '1s',
                                'delay': '.4s'
                            }">
                                GIFT CARD
                            </h3>
                            <p class="font-weight-normal text-default slide-animate" data-animation-options="{
                                'name': 'fadeInUpShorter',
                                'duration': '1s',
                                'delay': '.8s'
                            }">
                                Exchange with Money
                            </p>
                            <a href="{{ route('sell') }}"
                                class="btn btn-dark btn-outline btn-rounded btn-icon-right slide-animate"
                                data-animation-options="{
                                'name': 'fadeInUpShorter',
                                'duration': '1s',
                                'delay': '1s'
                            }">
                                SELL NOW<i class="w-icon-long-arrow-right"></i>
                            </a>
                        </div>
                        <!-- End of .banner-content -->
                    </div>
                    <!-- End of .container -->
                </div>
                <!-- End of .intro-slide2 -->

                <div class="swiper-slide banner banner-fixed intro-slide intro-slide3"
                    style="background-image: url({{ asset('user-assets/images/sliders/slide-3.jpg') }}); background-color: #f0f1f2;">
                    <div class="container">
                        <figure class="slide-image skrollable slide-animate" data-animation-options="{
                            'name': 'fadeInDownShorter',
                            'duration': '1s'
                        }">
                            <img src="{{ asset('user-assets/images/sliders/skate.png') }}" alt="Banner"
                                data-bottom-top="transform: translateY(10vh);"
                                data-top-bottom="transform: translateY(-10vh);" width="310" height="444">
                        </figure>
                        <div class="banner-content text-right y-50">
                            <p class="font-weight-normal text-default text-uppercase mb-0 slide-animate"
                                data-animation-options="{
                                'name': 'fadeInLeftShorter',
                                'duration': '1s',
                                'delay': '.6s'
                            }">
                                BIG SMILE & GREAT DEAL
                            </p>
                            <h5 class="banner-subtitle font-weight-normal text-default ls-25 slide-animate"
                                data-animation-options="{
                                'name': 'fadeInLeftShorter',
                                'duration': '1s',
                                'delay': '.4s'
                            }">
                                Trending Methods
                            </h5>
                            <h3 class="banner-title p-relative font-weight-bolder ls-50 slide-animate"
                                data-animation-options="{
                                'name': 'fadeInLeftShorter',
                                'duration': '1s',
                                'delay': '.2s'
                            }"><span class="text-white mr-4">Bit&nbsp;</span> - &nbsp;Coin
                            </h3>
                            <div class="btn-group slide-animate" data-animation-options="{
                                'name': 'fadeInLeftShorter',
                                'duration': '1s',
                                'delay': '.8s'
                            }">
                                <a href="{{ route('buy') }}"
                                    class="btn btn-dark btn-outline btn-rounded btn-icon-right">SHOP
                                    NOW<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                            <!-- End of .banner-content -->
                        </div>
                        <!-- End of .container -->
                    </div>
                </div>
                <!-- End of .intro-slide3 -->
            </div>
            <div class="swiper-pagination"></div>
            <button class="swiper-button-next"></button>
            <button class="swiper-button-prev"></button>
        </div>
        <!-- End of .swiper-container -->
    </section>
    <!-- End of .intro-section -->

    <div class="container ">
        <div class="swiper-container appear-animate icon-box-wrapper br-sm mt-6 mb-6" data-swiper-options="{
            'slidesPerView': 1,
            'loop': false,
            'breakpoints': {
                '576': {
                    'slidesPerView': 2
                },
                '768': {
                    'slidesPerView': 3
                },
                '1200': {
                    'slidesPerView': 4
                }
            }
        }">
            <div class="swiper-wrapper row cols-md-4 cols-sm-3 cols-1">
                <div class="swiper-slide icon-box icon-box-side icon-box-primary">
                    <span class="icon-box-icon icon-shipping">
                        <i class="w-icon-truck"></i>
                    </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title font-weight-bold mb-1">Free Shipping & Returns</h4>
                        <p class="text-default">For all orders over $99</p>
                    </div>
                </div>
                <div class="swiper-slide icon-box icon-box-side icon-box-primary">
                    <span class="icon-box-icon icon-payment">
                        <i class="w-icon-bag"></i>
                    </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title font-weight-bold mb-1">Secure Payment</h4>
                        <p class="text-default">We ensure secure payment</p>
                    </div>
                </div>
                <div class="swiper-slide icon-box icon-box-side icon-box-primary icon-box-money">
                    <span class="icon-box-icon icon-money">
                        <i class="w-icon-money"></i>
                    </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title font-weight-bold mb-1">Money Back Guarantee</h4>
                        <p class="text-default">Any back within 30 days</p>
                    </div>
                </div>
                <div class="swiper-slide icon-box icon-box-side icon-box-primary icon-box-chat">
                    <span class="icon-box-icon icon-chat">
                        <i class="w-icon-chat"></i>
                    </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title font-weight-bold mb-1">Customer Support</h4>
                        <p class="text-default">Call or email us 24/7</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Iocn Box Wrapper -->

    <section class="call-section" style="background-color: #212529;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h4 class="text-white text-uppercase">LOOKING FOR HELP TO SELL & BUY GIFT CARDS?</h4>
                    <h2 class="text-white">BEST GIFT CARDS XCHANGE PLATFORM</h2>
                    <h3>Call Us or Drop Us a Message Through Our Contact Form</h3>
                </div>
                <div class="col-lg-5 call-action">
                    <div class="d-inline-flex align-items-center text-left divider">
                        <i class="icon-phone-1 text-white mr-2"></i>
                        <h6 class="pt-1 line-height-1 text-uppercase text-white">CALL US NOW<a href="tel:+1 508 322 1918"
                                class="d-block text-white ls-10 pt-2">+1 508 322 1918</a></h6>
                    </div>
                    <a href="{{ route('contact-us') }}" class="btn btn-borders btn-rounded btn-outline-white ls-25">CONTACT US</a>
                </div>
            </div>
        </div>
    </section>

    <div class="banners-group">
        <div class="row m-0">
            <div class="col-sm-6 col-xl-3 pr-0 pl-0">
                <div class="banner banner-1 banner-md-vw-small">
                    <a href="{{ route('buy') }}">
                        <img src="assets/images/banners/banner-1.jpg" style="background-color: #add;" alt="banner" width="480" height="200" />
                    </a>
                    <div class="banner-layer banner-layer-right banner-layer-middle">
                        <h2 class="mb-0 text-right">TRENDING</h2>
                        <h3 class="m-b-3 text-right">Gift Cards</h3>
                        <h4 class="ls-10 m-b-3 text-right text-primary">STARTING AT $9</h4>
                        <div class="mb-0 text-right">
                            <a href="{{ route('buy') }}" class="btn btn-modern btn-md btn-dark">
                                Buy NOW!
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End .banner -->
            </div>
            <!-- End .col-lg-3 -->

            <div class="col-sm-6 col-xl-3 pr-0 pl-0">
                <div class="banner banner-2 banner-md-vw-small">
                    <a href="{{ route('buy') }}">
                        <img src="assets/images/banners/banner-2.jpg" style="background-color: #444;" alt="banner" width="480" height="200" />
                    </a>
                    <div class="banner-layer banner-layer-right banner-layer-middle">
                        <h2 class="ls-n-20 m-b-2 text-right text-primary">CARDSTRADE</h2>
                        <h3 class="ls-n-20 m-b-2 text-right text-white">TOP BRANDS</h3>
                        <div class="mb-0 text-right">
                            <a href="{{ route('buy') }}" class="btn btn-modern btn-md btn-light">
                                View Sale
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End .banner -->
            </div>
            <!-- End .col-lg-3 -->

            <div class="col-sm-6 col-xl-3 pr-0 pl-0">
                <div class="banner banner-3 banner-md-vw-small">
                    <a href="{{ route('buy') }}">
                        <img src="assets/images/banners/banner-3.jpg" style="background-color: #aaa;" alt="banner" width="480" height="200" />
                    </a>
                    <div class="banner-layer banner-layer-left banner-layer-middle">
                        <h2 class="m-b-1 font3 text-left">Great Deal</h2>
                        <h3 class="m-b-3 text-left">50% OFF</h3>
                        <div class="vc_btn3-container mb-0 vc_btn3-inline">
                            <a href="{{ route('buy') }}" class="btn btn-modern btn-md btn-dark ls-10">
                                Get Yours!
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End .banner -->
            </div>
            <!-- End .col-lg-3 -->

            <div class="col-sm-6 col-xl-3 pr-0 pl-0">
                <div class="banner banner-4 banner-md-vw-small">
                    <a href="{{ route('buy') }}">
                        <img src="assets/images/banners/banner-4.jpg" style="background-color: #eee;" alt="banner" width="480" height="200" />
                    </a>
                    <div class="row banner-layer banner-layer-middle align-items-center">
                        <div class="col-7">
                            <h3 class="m-b-1 text-right">DEAL PROMOS</h3>
                            <h4 class="mb-0 text-right ls-10">STARTING AT $9</h4>
                        </div>
                        <div class="col-5">
                            <div class="mb-0">
                                <a href="{{ route('buy') }}" class="btn btn-modern btn-md btn-dark">
                                    BUY NOW
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .banner -->
            </div>
            <!-- End .col-lg-3 -->
        </div>
        <!-- End .row -->
    </div>

    <div class="container mb-3 mt-10">
        <div class="iconbox-section iconbox-boxed-section">
            <h4 class="title title-center mb-5" style="font-size: 5rem">WHY CHOOSE CARDSTRADE?</h4>
            <div class="swiper-container swiper-theme shadow-swiper show-code-action" data-swiper-options="{
                'spaceBetween': 20,
                'slidesPerView': 1,
                'breakpoints': {
                    '576': {
                        'slidesPerView': 2
                    },
                    '768': {
                        'slidesPerView': 3
                    },
                    '992': {
                        'slidesPerView': 4
                    }
                }
            }">
                <div class="swiper-wrapper row cols-lg-4 cols-md-3 cols-sm-2 cols-1">
                    <div class="swiper-slide icon-box-wrap">
                        <div class="icon-box icon-colored-circle icon-border-box text-center">
                            <span class="icon-box-icon text-white">
                                <i class="w-icon-heart"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Michigan based and family owned and operated</h4>
                                <p>Independently owned and operated since 2011. We are a Michigan based company and have lived locally in the Ann Arbor area for over 40 years.</p>
                                <a href="{{ route('about-us') }}">Learn More
                                    <i class="w-icon-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide icon-box-wrap">
                        <div class="icon-box icon-colored-circle icon-border-box text-center">
                            <span class="icon-box-icon text-white">
                                <i class="w-icon-bag"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Faster processing and payment</h4>
                                <p>Cut your processing and payment time by dealing with a local or regional provider.</p>
                                <a href="{{ route('about-us') }}">Learn More
                                    <i class="w-icon-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide icon-box-wrap">
                        <div class="icon-box icon-colored-circle icon-border-box text-center">
                            <span class="icon-box-icon text-white">
                                <i class="w-icon-money"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Receive your payment via check, Paypal and Bitcoin</h4>
                                <p>Receive your payment in the mail via check or in Paypl Or Your Bitcoin Wallet.</p>
                                <a href="{{ route('about-us') }}">Learn More
                                    <i class="w-icon-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide icon-box-wrap">
                        <div class="icon-box icon-colored-circle icon-border-box text-center">
                            <span class="icon-box-icon text-white">
                                <i class="w-icon-chat"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">99% Customer Satisfaction</h4>
                                <p>Don’t believe It? Check out our latest eBay Feedback rating by clicking the text above!</p>
                                <a href="{{ route('about-us') }}">Learn More
                                    <i class="w-icon-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

    <hr>

    <div class="container mt-4">
        <div class="swiper-container swiper-theme show-code-action" data-swiper-options="{
            'spaceBetween': 20,
            'autoplay': true,
            'slidesPerView': 2,
            'breakpoints': {
                '576': {
                    'slidesPerView': 3
                },
                '992': {
                    'slidesPerView': 4
                },
                '1200': {
                    'slidesPerView': 5
                }
            }
        }">
            <div class="swiper-wrapper row cols-xl-5 cols-lg-4 cols-sm-3 cols-2">

                <figure class="swiper-slide instagram br-sm">
                    <a href="#">
                        <img src="{{ asset('assets/images/products/product5.png') }}" alt="Instagram" width="232"
                            height="232" />
                    </a>
                </figure>
                <figure class="swiper-slide instagram br-sm">
                    <a href="#">
                        <img src="{{ asset('assets/images/products/product7.png') }}" alt="Instagram" width="232"
                            height="232" />
                    </a>
                </figure>
                <figure class="swiper-slide instagram br-sm">
                    <a href="#">
                        <img src="{{ asset('assets/images/products/product9.png') }}" alt="Instagram" width="232"
                            height="232" />
                    </a>
                </figure>
                <figure class="swiper-slide instagram br-sm">
                    <a href="#">
                        <img src="{{ asset('assets/images/products/product10.png') }}" alt="Instagram" width="232"
                            height="232" />
                    </a>
                </figure>
                <figure class="swiper-slide instagram br-sm">
                    <a href="#">
                        <img src="{{ asset('assets/images/products/product12.png') }}" alt="Instagram" width="232"
                            height="232" />
                    </a>
                </figure>
                <figure class="swiper-slide instagram br-sm">
                    <a href="#">
                        <img src="{{ asset('assets/images/products/product13.png') }}" alt="Instagram" width="232"
                            height="232" />
                    </a>
                </figure>
                <figure class="swiper-slide instagram br-sm">
                    <a href="#">
                        <img src="{{ asset('assets/images/products/product14.png') }}" alt="Instagram" width="232"
                            height="232" />
                    </a>
                </figure>
                <figure class="swiper-slide instagram br-sm">
                    <a href="#">
                        <img src="{{ asset('assets/images/products/product15.png') }}" alt="Instagram" width="232"
                            height="232" />
                    </a>
                </figure>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</main>

{{-- <main class="main home">
    <div class="home-slider-container">
        <div class="home-slider owl-carousel owl-theme dot-inside slide-animate" data-owl-options="{
            'dots': true,
            'nav': false
        }">
            <div class="home-slide home-slide-1 banner banner-h-100 banner-md-vw-small">
                <img class="slide-bg h-100" src="{{ asset('assets/images/slider/slide-1.jpg') }}" style="background-color: #ccc;" width="1903" height="969" alt="Home Banner" />
                <!-- End .slide-bg -->
                <div class="banner-layer banner-layer-middle text-center">
                    <h2 class="text-center font3 font-weight-normal m-b-4 text-primary appear-animate" data-animation-duration="1200" data-animation-name="fadeIn">Big Smile & Great Deal</h2>
                    <h3 class="text-center m-b-1 text-uppercase appear-animate" data-animation-delay="800" data-animation-duration="1200" data-animation-name="blurIn">big sale up to</h3>
                    <h3 class="text-center m-b-4 text-sale appear-animate" data-animation-delay="1600" data-animation-duration="1200" data-animation-name="fadeIn">80%<small>OFF</small></h3>
                    <h5 class="d-inline-block m-r-3 text-left text-uppercase appear-animate" data-animation-delay="2200" data-animation-duration="1200" data-animation-name="fadeIn">
                        Starting At</h5>
                    <h5 class="coupon-sale-text text-left text-light appear-animate" data-animation-delay="2200" data-animation-duration="1200" data-animation-name="fadeIn">
                        $<b>14</b>99</h5>
                    <div class="mb-0 p-t-2 appear-animate" data-animation-delay="2500" data-animation-name="fadeInUpShorter">
                        <a href="#" class="btn btn-borders btn-xl btn-outline-dark ls-10">
                            BUY NOW
                        </a>
                    </div>
                </div>
                <!-- End .home-slide-content -->
            </div>
            <!-- End .home-slide -->
            <div class="home-slide home-slide-2 banner banner-h-100 banner-md-vw-small">
                <img class="slide-bg h-100" src="{{ asset('assets/images/slider/slide-1.jpg') }}" style="background-color: #ccc;" width="1903" height="969" alt="Home Banner" />
                <div class="banner-layer banner-layer-middle banner-layer-left appear-animate" data-animation-name="fadeIn" data-animation-duration="1200" data-animation-delay="200">
                    <h2 class="font3 font-weight-normal p-l-1 mb-0 ml-0">Summer Trends</h2>
                    <h3 class="mb-0 text-left text-uppercase">sale</h3>
                </div>
                <div class="banner-layer banner-layer-middle banner-layer-right appear-animate" data-animation-name="fadeIn" data-animation-duration="1200" data-animation-delay="400">
                    <h4 class="pl-2 font-weight-light mb-0 text-left text-uppercase">prices up to</h4>
                    <h3 class="mb-0 text-sale m-l-n-xs text-left text-uppercase">80%<small>OFF</small></h3>
                    <div class="mb-0 pl-2">
                        <a href="#" class="btn btn-modern btn-xl btn-primary">
                            BUY NOW
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End .home-slider -->
    </div>
    <!-- End .home-slider-container -->

    <div class="banners-group">
        <div class="row m-0">
            <div class="col-sm-6 col-xl-3 p-0 appear-animate" data-animation-delay="100" data-animation-duration="1200">
                <div class="banner banner-1 banner-md-vw-small">
                    <a href="#">
                        <img src="assets/images/banners/banner-1.jpg" style="background-color: #add;" alt="banner" width="480" height="200" />
                    </a>
                    <div class="banner-layer banner-layer-right banner-layer-middle">
                        <h2 class="mb-0 text-right">TRENDING</h2>
                        <h3 class="m-b-3 text-right">Gift Cards</h3>
                        <h4 class="ls-10 m-b-3 text-right text-primary">STARTING AT $9</h4>
                        <div class="mb-0 text-right">
                            <a href="demo6-shop.html" class="btn btn-modern btn-md btn-dark">
                                Buy NOW!
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End .banner -->
            </div>
            <!-- End .col-lg-3 -->

            <div class="col-sm-6 col-xl-3 p-0 appear-animate" data-animation-delay="500" data-animation-duration="1200">
                <div class="banner banner-2 banner-md-vw-small">
                    <a href="#">
                        <img src="assets/images/banners/banner-2.jpg" style="background-color: #444;" alt="banner" width="480" height="200" />
                    </a>
                    <div class="banner-layer banner-layer-right banner-layer-middle">
                        <h2 class="ls-n-20 m-b-2 text-right text-primary">FLASH SALE</h2>
                        <h3 class="ls-n-20 m-b-2 text-right">TOP BRANDS<br />CARDSTRADE</h3>
                        <h4 class="font-weight-bold ls-n-20 m-b-3 text-right text-light">STARTING AT
                            <sup>$</sup>9<sup>99</sup></h4>
                        <div class="mb-0 text-right">
                            <a href="demo6-shop.html" class="btn btn-modern btn-md btn-light">
                                View Sale
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End .banner -->
            </div>
            <!-- End .col-lg-3 -->

            <div class="col-sm-6 col-xl-3 p-0 appear-animate" data-animation-delay="900" data-animation-duration="1200">
                <div class="banner banner-3 banner-md-vw-small">
                    <a href="#">
                        <img src="assets/images/banners/banner-3.jpg" style="background-color: #aaa;" alt="banner" width="480" height="200" />
                    </a>
                    <div class="banner-layer banner-layer-left banner-layer-middle">
                        <h2 class="m-b-1 font3 text-left">Great Deal</h2>
                        <h3 class="m-b-3 text-left">50% OFF</h3>
                        <div class="vc_btn3-container mb-0 vc_btn3-inline">
                            <a href="demo6-shop.html" class="btn btn-modern btn-md btn-dark ls-10">
                                Get Yours!
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End .banner -->
            </div>
            <!-- End .col-lg-3 -->

            <div class="col-sm-6 col-xl-3 p-0 appear-animate" data-animation-delay="1200" data-animation-duration="1200">
                <div class="banner banner-4 banner-md-vw-small">
                    <a href="#">
                        <img src="assets/images/banners/banner-4.jpg" style="background-color: #eee;" alt="banner" width="480" height="200" />
                    </a>
                    <div class="row banner-layer banner-layer-middle align-items-center">
                        <div class="col-7">
                            <h3 class="m-b-1 text-right">DEAL PROMOS</h3>
                            <h4 class="mb-0 text-right ls-10">STARTING AT $9</h4>
                        </div>
                        <div class="col-5">
                            <div class="mb-0">
                                <a href="demo6-shop.html" class="btn btn-modern btn-md btn-dark">
                                    BUY NOW
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .banner -->
            </div>
            <!-- End .col-lg-3 -->
        </div>
        <!-- End .row -->
    </div>
    <!-- End .banners-group -->

    <section class="category-section mb-3">
        <div class="container-fluid">
            <h2 class="section-title ls-n-10 text-center text-uppercase">Featured Categories</h2>

            <div class="grid row">
                <div class="grid-item col-sm-4 col-md-3">
                    <div class="product-category appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="200" style="background-color: #eee;">
                        <a href="demo20-shop.html">
                            <figure>
                                <img src="assets/images/categories/category-4.jpg"
                                    alt="category" width="280" height="240">
                            </figure>
                            <div class="category-content">
                                <h3>Sports</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="grid-item col-sm-8 col-md-6">
                    <div class="product-category appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="200" style="background-color: #eee;">
                        <a href="demo20-shop.html">
                            <figure>
                                <img src="assets/images/categories/category-3.jpg"
                                    alt="category" width="580" height="240">
                            </figure>
                            <div class="category-content">
                                <h3>Apparel</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="grid-item col-sm-5 col-md-3">
                    <div class="product-category appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="200" style="background-color: #eee;">
                        <a href="demo20-shop.html">
                            <figure>
                                <img src="assets/images/categories/category-2.jpg"
                                    alt="category" width="280" height="240">
                            </figure>
                            <div class="category-content">
                                <h3>Food & Beverage</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="grid-item col-sm-7 col-md-4">
                    <div class="product-category appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="200" style="background-color: #eee;">
                        <a href="demo20-shop.html">
                            <figure>
                                <img src="assets/images/categories/category-5.jpg"
                                    alt="category" width="380" height="240">
                            </figure>
                            <div class="category-content">
                                <h3>Home & Garden</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="grid-item col-sm-4 col-md-3">
                    <div class="product-category appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="200" style="background-color: #eee;">
                        <a href="demo20-shop.html">
                            <figure>
                                <img src="assets/images/categories/category-8.jpg"
                                    alt="category" width="280" height="240">
                            </figure>
                            <div class="category-content">
                                <h3>Shoes</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="grid-item col-sm-8 col-md-5">
                    <div class="product-category appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="200" style="background-color: #eee;">
                        <a href="demo20-shop.html">
                            <figure>
                                <img src="assets/images/categories/category-1.jpg"
                                    alt="category" width="480" height="240">
                            </figure>
                            <div class="category-content">
                                <h3>Pets</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="grid-col-sizer col-1"></div>
            </div>
        </div>
    </section>

    <!-- End .half-section -->
    <div class="half-section">
        <div class="d-flex flex-wrap">
            <div class="col-md-12 col-12 half-img banner banner-md-vw-small xbanner banner-5 bg-img d-flex align-items-center justify-content-end" style="background-image: url('assets/images/backgrounds/bg-2.png');">
                <div class="banner-content">
                    <h3 class="ls-n-10 m-b-3 text-right">BUY GIFT CARDS WITH<br /><strong>BITCOIN</strong></h3>
                    <p class="line-height-1 m-b-4 text-right">Shop from 300+ Brands with Bitcoin | No Additional Fee | Extra Reward Point</p>
                    <div class="mb-0 text-right">
                        <a href="demo6-shop.html" class="btn btn-borders btn-lg btn-outline-primary">
                            BUY NOW
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End .no-gutters -->
    </div>
    <!-- End .half-section -->

    <!-- Send Us a Message -->
    <section class="call-section appear-animate" style="background-color: #212529;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h4 class="text-white text-uppercase">LOOKING FOR HELP TO SELL & BUY GIFT CARDS?</h4>
                    <h2 class="text-white">BEST GIFT CARDS XCHANGE PLATFORM</h2>
                    <h3>Call Us or Drop Us a Message Through Our Contact Form</h3>
                </div>
                <div class="col-lg-5 call-action">
                    <div class="d-inline-flex align-items-center text-left divider">
                        <i class="icon-phone-1 text-white mr-2"></i>
                        <h6 class="pt-1 line-height-1 text-uppercase text-white">CALL US NOW<a href="tel:+1 508 322 1918"
                                class="d-block text-white ls-10 pt-2">+1 508 322 1918</a></h6>
                    </div>
                    <a href="{{ route('contact-us') }}" class="btn btn-borders btn-rounded btn-outline-white ls-25">CONTACT US</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Send Us a Message -->

    <div class="container-fluid m-b-5 p-b-3">
        <div class="feature-boxes-container pb-3">
            <div class="row mt-7 mb-1">
                <div class="col-xl-12 col-md-12 mb-4">
                    <h2 class="text-center">WHY CHOOSE CARDSTRADE?</h2>
                </div>
                <div class="col-xl-3 col-sm-6 appear-animate" data-animation-delay="500" data-animation-name="fadeInRightShorter">
                    <div class="feature-box px-sm-5 px-md-5 mx-sm-5 mx-md-3 feature-box-simple feature-rounded text-center">
                        <i class="icon-earphones-alt bg-secondary text-white m-b-3"></i>

                        <div class="feature-box-content p-0">
                            <h3 class="m-b-1">99% Customer Satisfaction</h3>
                            <h5 class="font-weight-normal line-height-1 m-b-3">Need Assistance?</h5>
                            <p>Don’t believe It? Check out our latest eBay Feedback rating by clicking the text above!</p>
                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-md-4 -->
                <div class="col-xl-3 col-sm-6 appear-animate" data-animation-name="fadeInRightShorter">
                    <div class="feature-box px-sm-5 px-md-5 mx-sm-5 mx-md-3 feature-box-simple feature-rounded text-center">
                        <i class="icon-credit-card  bg-secondary text-white m-b-3"></i>

                        <div class="feature-box-content p-0">
                            <h3 class="m-b-1">Faster processing and payment</h3>
                            <h5 class="font-weight-normal line-height-1 m-b-3">Safe &amp; Fast</h5>

                            <p>Cut your processing and payment time by dealing with a local or regional provider.</p>
                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-md-4 -->
                <div class="col-xl-3 col-sm-6 appear-animate" data-animation-name="fadeInLeftShorter">
                    <div class="feature-box px-sm-5 px-md-5 mx-sm-5 mx-md-3 feature-box-simple feature-rounded text-center">
                        <i class="icon-action-undo  bg-secondary text-white m-b-3"></i>

                        <div class="feature-box-content p-0">
                            <h3 class="m-b-1">Receive your payment via check, Paypal and Bitcoin</h3>
                            <h5 class="font-weight-normal line-height-1 m-b-3">Easy &amp; Free</h5>

                            <p>Receive your payment in the mail via check or in Paypl Or Your Bitcoin Wallet</p>
                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-md-4 -->
                <div class="col-xl-3 col-sm-6 appear-animate" data-animation-delay="500" data-animation-name="fadeInLeftShorter">
                    <div class="feature-box px-sm-5 px-md-5 mx-sm-5 mx-md-3 feature-box-simple feature-rounded text-center">
                        <i class="icon-shipping bg-secondary text-white m-b-3"></i>

                        <div class="feature-box-content p-0">
                            <h3 class="m-b-1">Michigan based and family owned and operated</h3>
                            <h5 class="font-weight-normal line-height-1 m-b-3">Orders Over 40+ Years</h5>

                            <p>Independently owned and operated since 2011. We are a Michigan based company and have lived locally in the Ann Arbor area for over 40 years.</p>
                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-md-4 -->
            </div>
            <!-- End .feature-boxes-container.row -->
        </div>
    </div>
    <!-- End .container-fluid -->

</main> --}}

@endsection

@push('page-script')

@endpush
