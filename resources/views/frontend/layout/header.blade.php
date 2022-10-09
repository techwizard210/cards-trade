<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left d-none d-md-block">
                <div class="info-box info-box-icon-left text-primary justify-content-start p-0">
                    <i class="icon-shipping"></i>

                    <div class="info-box-content">
                        <h4>{{ __('message.home.free_delivery') }} CHF 250+</h4>
                    </div><!-- End .info-box-content -->
                </div>
            </div><!-- End .header-left -->

            <div class="header-right header-dropdowns ml-0 ml-md-auto w-md-100">
                <div class="header-dropdown ">
                    <a href="javascript:;"><i class="flag-{{ Helper::getLocaleCurrency()->flag }} flag"></i>{{ Helper::getLocaleCurrency()->name }}</a>
                    <div class="header-menu">
                        <ul>
                            @foreach(Helper::getCurrencies() as $list)
                            @if($list->name != Helper::getLocaleCurrency()->name )
                            <li><a href="{{ URL::to('/currency/'.$list->name) }}"><i class="flag-{{ $list->flag }} flag mr-2"></i>{{ $list->name }}</a></li>
                            @endif
                            @endforeach
                        </ul>
                    </div><!-- End .header-menu -->
                </div><!-- End .header-dropown -->

                <div class="header-dropdown mr-auto mr-md-0">
                    <a href="javascript:;"><i class="flag-{{ Helper::getLocaleLang(app()->getLocale())->flag }} flag"></i>{{ Helper::getLocaleLang(app()->getLocale())->short_name }}</a>
                    <div class="header-menu">
                        <ul>
                            @foreach(Helper::getLanguages() as $list)
                            @if($list->code != app()->getLocale())
                            <li><a href="{{ URL::to('/locale/'.$list->code) }}"><i class="flag-{{ $list->flag }} flag mr-2"></i>{{ $list->short_name }}</a></li>
                            @endif
                            @endforeach
                        </ul>
                    </div><!-- End .header-menu -->
                </div><!-- End .header-dropown -->

                <span class="separator d-none d-xl-block"></span>

                <ul class="top-links mega-menu d-none d-xl-flex mb-0 pr-2">
                    <li class="menu-item-type-custom menu-item-object-custom narrow">
                        <a href="{{ route('order.track', app()->getLocale()) }}"><i class="icon-shipping-truck"></i>{{ __('title.track_order') }}</a></li>
                    <li class="menu-item-type-post_type menu-item-object-page narrow">
                        <a href="{{ route('faq', app()->getLocale())}}"><i class="icon-help-circle"></i>{{ __('label.help') }}</a></li>
                    <li class="menu-item-type-post_type menu-item-object-page narrow">
                        <a href="{{ route('wishlist', app()->getLocale())}}"><i class="icon-wishlist-2"></i>{{ __('title.wishlist') }}</a>
                    </li>
                </ul>

                <span class="separator d-none d-md-block mr-0 ml-4"></span>

                <div class="social-icons">
                    <a href="{{ Helper::getCommonSetting('social_facebook') }}" class="social-icon social-facebook icon-facebook" target="_blank" title="facebook"></a>
                    <a href="{{ Helper::getCommonSetting('social_twitter') }}" class="social-icon social-twitter icon-twitter" target="_blank" title="twitter"></a>
                    <a href="{{ Helper::getCommonSetting('social_instagram') }}" class="social-icon social-instagram icon-instagram mr-0" target="_blank" title="instagram"></a>
                </div>
            </div>
        </div>
    </div>

    <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
        <div class="container">
            <div class="header-left col-lg-2 w-auto pl-0">
                <button class="mobile-menu-toggler text-dark mr-2" type="button">
                    <i class="fas fa-bars"></i>
                </button>
                <a href="{{ URL::to('/') }}" class="logo">
                    <img src="{{ asset('assets/images/logo-black.png') }}" class="w-100" width="202" height="80" alt="{{ Helper::getCommonSetting('company_logo_name') }}">
                </a>
            </div><!-- End .header-left -->

            <div class="header-right w-lg-max">
                <div class="header-icon header-search header-search-inline header-search-category w-lg-max text-right d-none d-sm-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                    <form action="{{ route('products', app()->getLocale()) }}" method="get">
                        <div class="header-search-wrapper">
                            <input type="search" class="form-control" name="q" id="search" placeholder="{{ __('label.search') }}..." required="" value="{{ !empty($_GET['q'])?$_GET['q']:'' }}">


                            <div class="select-custom font2">
                                <select id="cat" name="cat">
                                    <option value="all">{{ __('label.all_categories') }}</option>
                                    @foreach(Helper::getCategoryList() as $list)
                                        @if($list->child_cat->count()>0)
                                        <option value="{{ $list->slug }}" {{ !empty($_GET['cat'])&&$_GET['cat']==$list->slug?'selected':'' }}>{{ $list->title }}</option>
                                            @foreach($list->child_cat as $sub_list)
                                            <option value="{{ $sub_list->slug }}" {{ !empty($_GET['cat'])&&$_GET['cat']==$sub_list->slug?'selected':'' }}>- {{ $sub_list->title }}</option>
                                            @endforeach
                                        @else
                                        <option value="{{ $list->slug }}" {{ !empty($_GET['cat'])&&$_GET['cat']==$list->slug?'selected':'' }}>{{ $list->title }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn icon-magnifier" title="{{ __('label.search') }}" type="submit"></button>
                        </div>
                        <ul class="drop"></ul>
                    </form>

                </div>



                <span class="separator d-none d-lg-block"></span>

                <a class="sicon-box mb-0 d-none d-lg-flex align-items-center pr-3 mr-1" href="tel:{{ Helper::getCommonSetting('company_contact_phone') }}">
                    <div class=" sicon-default">
                        <i class="icon-phone-1"></i>
                    </div>
                    <div class="sicon-header">
                        <h4 class="sicon-title ls-n-25 text-uppercase">{{ __('message.call_us_now') }}</h4>
                        <p>{{ Helper::getCommonSetting('company_contact_phone') }}</p>
                    </div>
                </a>

                <span class="separator d-none d-lg-block mr-4"></span>

                @auth

                <span class="d-lg-block d-none">
                    <div class="header-user">
                        <i class="icon-user-2"></i>
                        <div class="header-userinfo">
                            <a href="{{ route('my-account', app()->getLocale()) }}"><span>{{ Auth::guard('user')->user()->name }}</span></a>
                            <a href="{{ route('logout', app()->getLocale()) }}"><h4>{{ __('title.logout') }}</h4></a>
                        </div>
                    </div>
                </span>

                @else

                <a href="{{ route('login', app()->getLocale()) }}" class="d-lg-block d-none">
                    <div class="header-user">
                        <i class="icon-user-2"></i>
                        <div class="header-userinfo">
                            <span>Welcome</span>
                            <h4>{{ __('title.login') }} / {{ __('title.register') }}</h4>
                        </div>
                    </div>
                </a>

                @endauth

                <span class="separator d-block"></span>

                <!-- Shopping Cart -->

                <div class="dropdown cart-dropdown" id="div-shopping-cart">
                @include('frontend.component.shopping-cart')
                </div>
                <!-- Shopping Cart -->

            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header d-none d-lg-flex" data-sticky-options="{'mobile': false}">
        <div class="container">
            <nav class="main-nav w-100">
                <ul class="menu w-100">
                    <li class="menu-item d-flex align-items-center">
                        <a href="#" class="d-inline-flex align-items-center sf-with-ul">
                            <i class="custom-icon-toggle-menu d-inline-table"></i><span>{{ __('label.all_categories') }}</span></a>
                        <div class="menu-depart">
                            @foreach(Helper::getCategoryList() as $list)
                            <a href="{{ route('products', app()->getLocale()).'?cat='.$list->slug }}"><i class="{{ !empty($list->icon)?$list->icon:'fa fa-circle' }}"></i>{{ $list->title }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="active">
                        <a href="{{ route('home', app()->getLocale()) }}">{{ __('title.home') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('products', app()->getLocale()) }}">{{ __('label.shop') }}</a>
                        {{-- <div class="megamenu megamenu-fixed-width megamenu-3cols">
                            <div class="row">
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">VARIATION 1</a>
                                    <ul class="submenu">
                                        <li><a href="demo42-shop.html" title="shop">Fullwidth Banner</a></li>
                                        <li><a href="category-banner-boxed-slider.html">Boxed Slider
                                                Banner</a>
                                        </li>
                                        <li><a href="category-banner-boxed-image.html">Boxed Image
                                                Banner</a>
                                        </li>
                                        <li><a href="demo42-shop.html" title="shop">Left Sidebar</a></li>
                                        <li><a href="category-sidebar-right.html">Right Sidebar</a></li>
                                        <li><a href="category-off-canvas.html">Off Canvas Filter</a></li>
                                        <li><a href="category-horizontal-filter1.html">Horizontal
                                                Filter1</a>
                                        </li>
                                        <li><a href="category-horizontal-filter2.html">Horizontal
                                                Filter2</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">VARIATION 2</a>
                                    <ul class="submenu">
                                        <li><a href="category-list.html">List Types</a></li>
                                        <li><a href="category-infinite-scroll.html">Ajax Infinite Scroll</a>
                                        </li>
                                        <li><a href="demo42-shop.html" title="shop">3 Columns Products</a></li>
                                        <li><a href="category-4col.html">4 Columns Products</a></li>
                                        <li><a href="category-5col.html">5 Columns Products</a></li>
                                        <li><a href="category-6col.html">6 Columns Products</a></li>
                                        <li><a href="category-7col.html">7 Columns Products</a></li>
                                        <li><a href="category-8col.html">8 Columns Products</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 p-0">
                                    <div class="menu-banner">
                                        <figure>
                                            <img src="{{ asset('assets/images/menu-banner.jpg') }}" width="192" height="313"
                                                alt="Menu banner">
                                        </figure>
                                        <div class="banner-content">
                                            <h4>
                                                <span class="">UP TO</span><br />
                                                <b class="">50%</b>
                                                <i>OFF</i>
                                            </h4>
                                            <a href="demo42-shop.html" class="btn btn-sm btn-dark">SHOP NOW</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End .megamenu --> --}}
                    </li>
                    <li>
                        <a href="#">{{ __('title.glasses') }}</a>
                        <div class="megamenu megamenu-fixed-width">
                            <div class="row">
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">PRODUCT PAGES</a>
                                    <ul class="submenu">
                                        <li><a href="#">Women's Glasses</a></li>
                                        <li><a href="#">Men's Glasses</a></li>
                                        <li><a href="#">Kid's Glasses</a></li>
                                        <li><a href="#">Blue Light Blocking Glasses</a></li>
                                        <li><a href="#">New Arrivals</a></li>
                                        <li><a href="#">Best Sellers</a></li>
                                    </ul>
                                </div><!-- End .col-lg-4 -->

                                <div class="col-lg-4">
                                    <a href="#" class="nolink">PRODUCT PAGES</a>
                                    <ul class="submenu">
                                        <li><a href="#">Women's Glasses</a></li>
                                        <li><a href="#">Men's Glasses</a></li>
                                        <li><a href="#">Kid's Glasses</a></li>
                                        <li><a href="#">Blue Light Blocking Glasses</a></li>
                                        <li><a href="#">New Arrivals</a></li>
                                        <li><a href="#">Best Sellers</a></li>
                                    </ul>
                                </div><!-- End .col-lg-4 -->

                                <div class="col-lg-4 p-0">
                                    <div class="menu-banner menu-banner-2">
                                        <figure>
                                            <img src="{{ asset('assets/images/menu-banner-1.jpg') }}" alt="{{ __('label.vto') }}"
                                                class="product-promo">
                                        </figure>
                                        <i>OFF</i>
                                        <div class="banner-content">
                                            <h4>
                                                <span class="">UP TO</span><br />
                                                <b class="">50%</b>
                                            </h4>
                                        </div>
                                        <a href="{{ route('test') }}" class="btn btn-sm btn-dark">{{ __('label.vto') }}</a>
                                    </div>
                                </div><!-- End .col-lg-4 -->
                            </div><!-- End .row -->
                        </div><!-- End .megamenu -->
                    </li>
                    <li>
                        <a href="#">{{ __('label.support') }} &amp; {{ __('label.help') }}</a>
                        <ul>
                            <li><a href="{{ route('contact-us', app()->getLocale()) }}">{{ __('title.contact_us') }}</a></li>
                            <li><a href="{{ route('about-us', app()->getLocale()) }}">{{ __('title.about_us') }}</a></li>
                        </ul>
                    </li>
                    {{-- <li class="float-right"><a href="#special-offer-div" class="pr-0">{{ __('title.special_offers') }}</a></li> --}}
                </ul>
            </nav>
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header>
