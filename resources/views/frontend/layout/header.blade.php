<!-- Start of Header -->
<header class="header header-border">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <p class="welcome-msg">Welcome to CarsTrade - World Best Gift Card Xchange Platform!</p>
            </div>
            <div class="header-right">
                <span class="divider d-lg-show"></span>
                <a href="blog.html" class="d-lg-show">Blog</a>
                <a href="contact-us.html" class="d-lg-show">Contact Us</a>

                {{-- <a href="{{ route('ajaxLogin') }}" class="d-lg-show login sign-in"><i
                        class="w-icon-account"></i>Sign In</a> --}}
                {{-- <span class="delimiter d-lg-show">/</span>

                <a href="assets/ajax/login.html" class="ml-0 d-lg-show login register">Register</a> --}}
                @auth
                <a href="my-account.html" class="d-lg-show">My Account</a>
                <a href="{{ route('logout') }}" class="d-lg-show">Sign Out</a>
                @else
                <a href="{{ route('login') }}" class="d-lg-show"><i
                    class="w-icon-account"></i>Sign In</a>
            <span class="delimiter d-lg-show">/</span>
            <a href="{{ route('logout') }}" class="ml-0 d-lg-show">Register</a>
            @endauth
            </div>
        </div>
    </div>
    <!-- End of Header Top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left mr-md-4">
                <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
                </a>
                <a href="{{ route('home') }}" class="logo ml-lg-0">
                    <img src="{{ asset('user-assets/images/logo-black.png') }}" alt="CardsTrade" width="180" height="45" />
                </a>
                <form method="get" action="#" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                    <div class="select-box">
                        <select id="category" name="category">
                            <option value="0">All Categories</option>
                            @foreach (Helper::getAllCategories() as $list)
                            <option value="{{ $list->id }}">{{ $list->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="text" class="form-control" name="search" id="search"
                        placeholder="Search in..." required />
                    <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                    </button>
                </form>
            </div>
            <div class="header-right ml-4">
                <div class="header-call d-xs-show d-lg-flex align-items-center">
                    <a href="tel:#" class="w-icon-call"></a>
                    <div class="call-info d-lg-show">
                        <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                            <a href="https://wa.me/+15083221918" class="text-capitalize" target="_blank">Whatsapp</a> or :</h4>
                        <a href="tel:+1 508 322 1918" class="phone-number font-weight-bolder ls-50">+1 (508) 322-1918</a>
                    </div>
                </div>
                <a class="wishlist label-down link d-xs-show" href="{{ route('wishlist') }}">
                    <i class="w-icon-heart"></i>
                    <span class="wishlist-label d-lg-show">Wishlist</span>
                </a>
                {{-- <a class="compare label-down link d-xs-show" href="compare.html">
                    <i class="w-icon-compare"></i>
                    <span class="compare-label d-lg-show">Compare</span>
                </a> --}}
                <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2" id="div-shopping-cart">
                    @include('frontend.components.shopping-cart')
                </div>
            </div>
        </div>
    </div>
    <!-- End of Header Middle -->

    <div class="header-bottom sticky-content fix-top sticky-header">
        <div class="container">
            <div class="inner-wrap">
                <div class="header-left">
                    <div class="dropdown category-dropdown has-border" data-visible="true">
                        <a href="#" class="category-toggle" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="true" data-display="static"
                            title="Browse Categories">
                            <i class="w-icon-category"></i>
                            <span>Browse Categories</span>
                        </a>

                        <div class="dropdown-box">
                            <ul class="menu vertical-menu category-menu">
                                @foreach (Helper::getAllCategories() as $list)
                                <li>
                                    <a href="{{ route('buy').'?cat='.$list->id }}">
                                        {{ $list->title }}
                                    </a>
                                </li>
                                @endforeach
                                <li>
                                    <a href="{{ route('buy') }}" class="font-weight-bold text-primary text-uppercase ls-25">
                                        View All Categories<i class="w-icon-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <nav class="main-nav">
                        <ul class="menu active-underline">
                            <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                                <a href="{{ route('home') }}">HOME</a>
                            </li>
                            <li class="{{ Route::currentRouteName() == 'sell' ? 'active' : '' }}">
                                <a href="{{ route('sell') }}">SELL MY GIFT CARDS</a>
                            </li>
                            <li class="{{ Route::currentRouteName() == 'buy' ? 'active' : '' }}">
                                <a href="{{ route('buy') }}">BUY GIFT CARDS</a>
                            </li>
                            <li class="{{ Route::currentRouteName() == 'about-us' ? 'active' : '' }}">
                                <a href="{{ route('about-us') }}">ABOUT US</a>
                            </li>
                            <li class="{{ Route::currentRouteName() == 'contact-us' ? 'active' : '' }}">
                                <a href="{{ route('contact-us') }}">CONTACT US</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="header-right">
                    {{-- <a href="#" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>Track Order</a>
                    <a href="#"><i class="w-icon-sale"></i>Daily Deals</a> --}}
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End of Header -->
