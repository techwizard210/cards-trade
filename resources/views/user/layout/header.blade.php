<header class="header {{ Route::currentRouteName() == 'header-transparent' ? 'active' : '' }}">
    <div class="header-middle sticky-header">
        <div class="container-fluid">
            <div class="header-left flex-1 d-none d-xl-flex">
                <nav class="main-nav w-100">
                    <ul class="menu ls-n-10">
                        <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                            <a href="{{ route('home') }}" class="pl-4">HOME</a>
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
            <!-- End .header-left -->

            <div class="header-center ml-0 ml-xl-auto">
                <a href="demo6.html" class="logo logo-transition">
                    <img src="{{ asset('assets/images/logo-black.png') }}" width="240" height="46" alt="CardsTrade" />
                </a>
            </div>
            <!-- End .header-center -->

            <div class="header-right flex-1 justify-content-end">
                <button class="mobile-menu-toggler" type="button">
                    <i class="fas fa-bars"></i>
                </button>

                @auth

                <span class="d-lg-block d-none mr-3">
                    <div class="header-user">
                        <i class="icon-user-2"></i>
                        <div class="header-userinfo">
                            <a href="{{ route('my-account') }}"><span>{{ Auth::guard('user')->user()->first_name }} {{ Auth::guard('user')->user()->last_name }}</span></a>
                            <a href="{{ route('logout') }}"><h4>SignOut</h4></a>
                        </div>
                    </div>
                </span>

                @else

                <a href="{{ route('login') }}" class="header-icon header-icon-user"><i class="icon-user-2"></i></a>

                @endauth

                <a href="#" class="header-icon"><i class="icon-wishlist-2"></i></a>

                <div class="header-search header-search-popup header-search-category d-none d-sm-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper">
                            <input type="search" class="form-control" name="q" id="q" placeholder="I'm searching for..." required="">
                            <div class="select-custom">
                                <select id="cat" name="cat">
                                    <option value="">All Categories</option>
                                    <option value="4">Fashion</option>
                                    <option value="12">- Women</option>
                                    <option value="13">- Men</option>
                                    <option value="66">- Jewellery</option>
                                    <option value="67">- Kids Fashion</option>
                                    <option value="5">Electronics</option>
                                    <option value="21">- Smart TVs</option>
                                    <option value="22">- Cameras</option>
                                    <option value="63">- Games</option>
                                    <option value="7">Home &amp; Garden</option>
                                    <option value="11">Motors</option>
                                    <option value="31">- Cars and Trucks</option>
                                    <option value="32">- Motorcycles &amp; Powersports</option>
                                    <option value="33">- Parts &amp; Accessories</option>
                                    <option value="34">- Boats</option>
                                    <option value="57">- Auto Tools &amp; Supplies</option>
                                </select>
                            </div>
                            <!-- End .select-custom -->
                            <button class="btn icon-search-3" type="submit"></button>
                        </div>
                        <!-- End .header-search-wrapper -->
                    </form>
                </div>
                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle dropdown-arrow cart-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-cart-thick"></i>
                        <span class="cart-count badge-circle">3</span>
                    </a>

                    <div class="cart-overlay"></div>

                    <div class="dropdown-menu mobile-cart">
                        <a href="#" title="Close (Esc)" class="btn-close">×</a>

                        <div class="dropdownmenu-wrapper custom-scrollbar">
                            <div class="dropdown-cart-header">Shopping Cart</div>
                            <!-- End .dropdown-cart-header -->

                            <div class="dropdown-cart-products">
                                <div class="product">
                                    <div class="product-details">
                                        <h4 class="product-title">
                                            <a href="product.html">Amazon Card</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">1</span> × $99.00
                                        </span>
                                    </div>
                                    <!-- End .product-details -->

                                    <figure class="product-image-container">
                                        <a href="product.html" class="product-image">
                                            <img src="assets/images/products/product-1.jpg" alt="product" width="80" height="80">
                                        </a>

                                        <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                    </figure>
                                </div>
                                <!-- End .product -->

                                <div class="product">
                                    <div class="product-details">
                                        <h4 class="product-title">
                                            <a href="product.html">Uber Card</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">1</span> × $35.00
                                        </span>
                                    </div>
                                    <!-- End .product-details -->

                                    <figure class="product-image-container">
                                        <a href="product.html" class="product-image">
                                            <img src="assets/images/products/product-2.jpg" alt="product" width="80" height="80">
                                        </a>

                                        <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                    </figure>
                                </div>
                                <!-- End .product -->

                                <div class="product">
                                    <div class="product-details">
                                        <h4 class="product-title">
                                            <a href="product.html">Steam Game Bonus Card</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">1</span> × $35.00
                                        </span>
                                    </div>
                                    <!-- End .product-details -->

                                    <figure class="product-image-container">
                                        <a href="product.html" class="product-image">
                                            <img src="assets/images/products/product-3.jpg" alt="product" width="80" height="80">
                                        </a>
                                        <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                    </figure>
                                </div>
                                <!-- End .product -->
                            </div>
                            <!-- End .cart-product -->

                            <div class="dropdown-cart-total">
                                <span>SUBTOTAL:</span>

                                <span class="cart-total-price float-right">$134.00</span>
                            </div>
                            <!-- End .dropdown-cart-total -->

                            <div class="dropdown-cart-action">
                                <a href="cart.html" class="btn btn-gray btn-block view-cart">View
                                    Cart</a>
                                <a href="checkout.html" class="btn btn-dark btn-block">Checkout</a>
                            </div>
                            <!-- End .dropdown-cart-total -->
                        </div>
                        <!-- End .dropdownmenu-wrapper -->
                    </div>
                    <!-- End .dropdown-menu -->
                </div>
            </div>
            <!-- End .header-right -->
        </div>
        <!-- End .container-fluid -->
    </div>
    <!-- End .header-middle -->
</header>
