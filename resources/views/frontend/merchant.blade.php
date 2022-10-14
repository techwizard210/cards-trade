@extends('frontend.layout.app')

@section('content')

<main class="main mb-10 pb-1">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav container">
        <ul class="breadcrumb bb-no">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('buy') }}">Merchants</a></li>
            <li>{{ $product_detail->name }}</li>
        </ul>
        <ul class="product-nav list-style-none">
            @if(!empty($prev))
            <li class="product-nav-prev">
                <a href="{{ route('product.detail', $prev->id) }}">
                    <i class="w-icon-angle-left"></i>
                </a>
                <span class="product-nav-popup">
                    @if(file_exists(public_path('storage/cards/'.$prev->image)) && !empty($prev->image))
                    <img src="{{ asset('storage/cards/'.$prev->image) }}" width="110"
                    height="110" alt="{{ $prev->name }}" />
                    @else
                    <img src="{{ asset('user-assets/images/default-card.png') }}" width="110"
                    height="110" alt="{{ $prev->title }}" />
                    @endif
                    <span class="product-name">{{ $prev->name }}</span>
                </span>
            </li>
            @endif
            @if(!empty($next))
            <li class="product-nav-next">
                <a href="{{ route('product.detail', $next->id) }}">
                    <i class="w-icon-angle-right"></i>
                </a>
                <span class="product-nav-popup">
                    @if(file_exists(public_path('storage/cards/'.$next->image)) && !empty($next->image))
                    <img src="{{ asset('storage/cards/'.$next->image) }}" width="110"
                    height="110" alt="{{ $next->name }}" />
                    @else
                    <img src="{{ asset('user-assets/images/default-card.png') }}" width="110"
                    height="110" alt="{{ $next->title }}" />
                    @endif
                    <span class="product-name">{{ $next->name }}</span>
                </span>
            </li>
            @endif
        </ul>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content">
        <div class="container">
            <div class="row gutter-lg">
                <div class="main-content">
                    <div class="product product-single row">
                        <div class="col-md-6 mb-6">
                            <div class="product-gallery product-gallery-sticky">
                                @if(file_exists(public_path('storage/cards/'.$product_detail->image)) && !empty($product_detail->image))
                                <img src="{{ asset('storage/cards/'.$product_detail->image) }}" alt="{{ $product_detail->name }}" />
                                @else
                                <img src="{{ asset('user-assets/images/default-card.png') }}" alt="{{ $product_detail->title }}" />
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 mb-md-6">
                            <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                <h1 class="product-title">{{ $product_detail->name }}</h1>
                                <div class="product-bm-wrapper">
                                    <div class="product-meta">
                                        <div class="product-categories">
                                            Category:
                                            <span class="product-category"><a href="#">{{ Helper::getProductCategory($product_detail->category)->title }}</a></span>
                                        </div>
                                    </div>
                                </div>

                                <hr class="product-divider">

                                <div class="product-price"><span class="price-label">Starting At</span><ins class="new-price">${{ $product_detail->value }}</ins></div>

                                <div class="product-short-desc">
                                    <ul class="list-type-check list-style-none">
                                        <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                                        <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                                        <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                                    </ul>
                                </div>

                                <hr class="product-divider">

                                <div class="social-links-wrapper">
                                    <div class="social-links">
                                        <div class="social-icons social-no-color border-thin">
                                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                            <a href="#"
                                                class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                            <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                            <a href="#"
                                                class="social-icon social-youtube fab fa-linkedin-in"></a>
                                        </div>
                                    </div>
                                    @auth
                                    <span class="divider d-xs-show"></span>
                                    <div class="product-link-wrapper d-flex">
                                        <a href="{{ route('wishlist') }}"
                                            class="btn-product-icon btn-wishlist {{ Helper::checkIfWishlist($product_detail->id)?'added w-icon-heart-full':'w-icon-heart' }}" data-id="{{ $product_detail->id }}"><span></span></a>
                                        {{-- <a href="#"
                                            class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a> --}}
                                    </div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="frequently-bought-together mt-5">
                        <table class="shop-table wishlist-table product-table">
                            <thead>
                                <tr>
                                    <th class="product-name"><span>Product</span></th>
                                    <th></th>
                                    <th><span>Quantity</span></th>
                                    <th><span>Value</span></th>
                                    <th><span>% Off</span></th>
                                    <th><span>You Pay</span></th>
                                    <th class="wishlist-action">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($contents as $list)
                                <tr>
                                    <td class="product-thumbnail">
                                        <div class="p-relative">
                                            <a href="#">
                                                <figure>
                                                    @if(file_exists(public_path('storage/cards/'.$list->merchant->image)) && !empty($list->merchant->image))
                                                    <img src="{{ asset('storage/cards/'.$list->merchant->image) }}" alt="{{ $list->merchant->name }}" width="300" height="338" />
                                                    @else
                                                    <img src="{{ asset('user-assets/images/default-card.png') }}" width="300px" height="300px" alt="{{ $list->merchant->title }}" />
                                                    @endif
                                                </figure>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="product-name">
                                        <a href="#">
                                            {{ $list->merchant->name }}
                                        </a>
                                    </td>
                                    <td class="">
                                        {{ $list->quantity }}
                                    </td>
                                    <td class="">
                                        ${{ number_format($list->value, 2) }}
                                    </td>
                                    <td class="">
                                        <span class="wishlist-in-stock">{{ $list->discount }}%</span>
                                    </td>
                                    <td class="">
                                        ${{ number_format($list->value*(100-$list->discount)/100, 2) }}
                                    </td>
                                    <td class="wishlist-action">
                                        <div class="d-lg-flex">
                                            {{-- <a href="#"
                                                class="btn btn-quickview btn-outline btn-default btn-rounded btn-sm mb-2 mb-lg-0">Quick
                                                View</a> --}}
                                            <a href="#" class="btn btn-dark btn-rounded btn-sm ml-lg-2 btn-cart" data-id="{{ $list->id }}">Add to
                                                cart</a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="7">There is no cards on this Merchant</td>
                                </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>

                </div>
                <!-- End of Main Content -->
                <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                    <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                    <div class="sidebar-content scrollable">
                        <div class="sticky-sidebar">
                            <div class="widget widget-icon-box mb-6">
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="w-icon-truck"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title">Free Shipping & Returns</h4>
                                        <p>For all orders over $99</p>
                                    </div>
                                </div>
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="w-icon-bag"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title">Secure Payment</h4>
                                        <p>We ensure secure payment</p>
                                    </div>
                                </div>
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="w-icon-money"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title">Money Back Guarantee</h4>
                                        <p>Any back within 30 days</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Widget Icon Box -->

                            <div class="widget widget-banner mb-9">
                                <div class="banner banner-fixed br-sm">
                                    <figure>
                                        <img src="{{ asset('user-assets/images/shop/banner3.jpg') }}" alt="Banner" width="266"
                                            height="220" style="background-color: #1D2D44;" />
                                    </figure>
                                    <div class="banner-content">
                                        <div class="banner-price-info font-weight-bolder text-white lh-1 ls-25">
                                            40<sup class="font-weight-bold">%</sup><sub
                                                class="font-weight-bold text-uppercase ls-25">Off</sub>
                                        </div>
                                        <h4
                                            class="banner-subtitle text-white font-weight-bolder text-uppercase mb-0">
                                            Ultimate Sale</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Widget Banner -->

                            <div class="widget widget-products">
                                <div class="title-link-wrapper mb-2">
                                    <h4 class="title title-link font-weight-bold">More Merchants</h4>
                                </div>

                                <div class="swiper nav-top">
                                    <div class="swiper-container swiper-theme nav-top" data-swiper-options = "{
                                        'slidesPerView': 1,
                                        'spaceBetween': 20,
                                        'navigation': {
                                            'prevEl': '.swiper-button-prev',
                                            'nextEl': '.swiper-button-next'
                                        }
                                    }">
                                        <div class="swiper-wrapper">
                                            <div class="widget-col swiper-slide">
                                                @foreach($featured as $index => $list)
                                                @if($index < 3)
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="{{ route('product.detail', $list->id) }}">
                                                            @if(file_exists(public_path('storage/cards/'.$list->image)) && !empty($list->image))
                                                            <img src="{{ asset('storage/cards/'.$list->image) }}" alt="{{ $list->title }}" width="100" height="113" />
                                                            @else
                                                            <img src="{{ asset('user-assets/images/default-card.png') }}" width="113" height="100px" alt="{{ $list->name }}" />
                                                            @endif
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="{{ route('product.detail', $list->id) }}">{{ $list->name }}</a>
                                                        </h4>
                                                        <div class="product-price">${{ number_format($list->value, 2) }}</div>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                            <div class="widget-col swiper-slide">
                                                @foreach($featured as $index => $list)
                                                @if($index > 2)
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="{{ route('product.detail', $list->id) }}">
                                                            @if(file_exists(public_path('storage/cards/'.$list->image)) && !empty($list->image))
                                                            <img src="{{ asset('storage/cards/'.$list->image) }}" alt="{{ $list->title }}" width="100" height="113" />
                                                            @else
                                                            <img src="{{ asset('user-assets/images/default-card.png') }}" width="113" height="100px" alt="{{ $list->name }}" />
                                                            @endif
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="{{ route('product.detail', $list->id) }}">{{ $list->name }}</a>
                                                        </h4>
                                                        <div class="product-price">${{ number_format($list->value, 2) }}</div>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <button class="swiper-button-next"></button>
                                        <button class="swiper-button-prev"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- End of Sidebar -->
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
</main>

@endsection
