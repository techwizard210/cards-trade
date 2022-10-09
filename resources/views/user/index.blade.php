@extends('user.layout.app')

@section('content')

<main class="main home">
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
            <div class="home-slide home-slide-2 banner banner-h-100 loaded banner-lg-vw">
                <video class="w-100" autoplay="" loop muted>
                    <source src="{{ asset('assets/images/slider/slide-2.mp4') }}" type="video/mp4" />
                    Your browser does not support HTML5 video.
                </video>
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
    <div class="brands-section m-b-5">
        <div class="container-fluid">
            <div class="brands-slider owl-carousel owl-theme" data-owl-options="{
                'margin': 0, 'padding': 10
            }">
                <img src="{{ asset('assets/images/products/product5.png') }}" width="130" height="56" alt="brand">
                <img src="{{ asset('assets/images/products/product21.png') }}" width="130" height="56" alt="brand">
                <img src="{{ asset('assets/images/products/product7.png') }}" width="130" height="56" alt="brand">
                <img src="{{ asset('assets/images/products/product9.png') }}" width="130" height="56" alt="brand">
                <img src="{{ asset('assets/images/products/product10.png') }}" width="130" height="56" alt="brand">
                <img src="{{ asset('assets/images/products/product12.png') }}" width="130" height="56" alt="brand">
                <img src="{{ asset('assets/images/products/product13.png') }}" width="130" height="56" alt="brand">
                <img src="{{ asset('assets/images/products/product14.png') }}" width="130" height="56" alt="brand">
                <img src="{{ asset('assets/images/products/product15.png') }}" width="130" height="56" alt="brand">
            </div>
        </div>
    </div>
</main>

@endsection

@push('page-script')

@endpush
