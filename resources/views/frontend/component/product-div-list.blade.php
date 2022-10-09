{{-- <div class="product-default inner-quickview inner-icon">
    <figure>
        <a href="{{ route('product-detail', [app()->getLocale(), $product->slug]) }}">
            @if(file_exists(public_path('products/'.$product->photo)) && !empty($product->photo))
            <img src="{{ asset('products/'.$product->photo) }}" width="300px" height="300px" alt="{{ $product->title }}" />
            @else
            <img src="{{ asset('assets/images/product-default.png') }}" width="300px" height="300px" alt="{{ $product->title }}" />
            @endif
        </a>
        <div class="label-group">
            @if($product->discount>0)
            <span class="product-label label-sale">-{{ $product->discount }}%</span>
            @endif
        </div>
        <div class="btn-icon-group">
            <a href="#" class="btn-icon btn-add-cart product-type-simple" data-id="{{ $product->id }}"><i class="icon-shopping-cart"></i></a>
        </div>
        <a href="{{ route('getQuickView', [app()->getLocale(), $product->id]) }}" class="btn-quickview" title="{{ __('title.buttons.quick_view') }}">{{ __('title.buttons.quick_view') }}</a>
    </figure>
    <div class="product-details">
        <div class="category-wrap">
            <div class="category-list">
                <a href="{{ route('products', app()->getLocale()).'?cat='.Helper::getProductCategory($product->cat_id)->slug }}">{{ Helper::getProductCategory($product->cat_id)->title }}</a>
                @if(!empty($product->child_cat_id)) ,
                <a href="{{ route('products', app()->getLocale()).'?cat='.Helper::getProductCategory($product->child_cat_id)->slug }}">{{ Helper::getProductCategory($product->child_cat_id)->title }}</a>
                @endif
            </div>
            @auth
            @if(Helper::checkIfWishlist($product->id))
            <a href="{{ route('wishlist', app()->getLocale()) }}" class="btn-icon-wish added-wishlist" title="{{ __('title.buttons.view_wishlist') }}">
                <i class="icon-heart"></i>
            </a>
            @else
            <a href="{{ route('wishlist', app()->getLocale()) }}" class="btn-icon-wish" data-id="{{ $product->id }}" title="{{ __('title.buttons.add_to_wishlist') }}">
                <i class="icon-heart"></i>
            </a>
            @endif
            @endauth
        </div>
        <h3 class="product-title">
            <a href="{{ route('product-detail', [app()->getLocale(), $product->slug]) }}">{{ $product->title }}</a>
        </h3>
        <div class="ratings-container">
            <div class="product-ratings">
                <span class="ratings" style="width:{{ Helper::getProductReview($product->id) }}%"></span>
                <span class="tooltiptext tooltip-top"></span>
            </div>
        </div>
        <div class="price-box">
            @if($product->discount>0)
            <del class="old-price">CHF {{ number_format($product->price, 2) }}</del>
            <span class="product-price">CHF {{ number_format(($product->price*(100-$product->discount)/100), 2) }}</span>
            @else
            <span class="product-price">CHF {{ number_format($product->price, 2) }}</span>
            @endif
        </div>
    </div>
</div> --}}

<figure>
    <a href="{{ route('product-detail', [app()->getLocale(), $product->slug]) }}">
        @if(file_exists(public_path('products/'.$product->photo)) && !empty($product->photo))
        <img src="{{ asset('products/'.$product->photo) }}" width="250px" height="250px" alt="{{ $product->title }}" />
        @else
        <img src="{{ asset('assets/images/product-default.png') }}" width="250px" height="250px" alt="{{ $product->title }}" />
        @endif
    </a>
    <div class="label-group">
        @if($product->discount_option == 2)
        <span class="product-label label-sale">-{{ $product->discount }}%</span>
        @endif
        @if($product->discount_option == 3)
        <span class="product-label label-sale">-{{ round(100- ( $product->discounted_price / $product->price)*100) }}%</span>
        @endif
    </div>
</figure>

<div class="product-details">
    <div class="category-list">
        <a href="{{ route('products', app()->getLocale()).'?cat='.Helper::getProductCategory($product->cat_id)->slug }}">{{ Helper::getProductCategory($product->cat_id)->title }}</a>
        @if(!empty($product->child_cat_id)) ,
        <a href="{{ route('products', app()->getLocale()).'?cat='.Helper::getProductCategory($product->child_cat_id)->slug }}">{{ Helper::getProductCategory($product->child_cat_id)->title }}</a>
        @endif
    </div>
    <h3 class="product-title">
        <a href="{{ route('product-detail', [app()->getLocale(), $product->slug]) }}">{{ $product->title }}</a>
    </h3>
    <div class="ratings-container">
        <div class="product-ratings">
            <span class="ratings" style="width:{{ Helper::getProductReview($product->id) }}%"></span>
            <span class="tooltiptext tooltip-top"></span>
        </div>
    </div>
    <!-- End .product-container -->
    <p class="product-description">{!! strip_tags($product->summary) !!}</p>
    <div class="price-box">
        @if($product->discount_option > 1)
        <span class="old-price">{{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency($product->price), 2) }}</span>
        <span class="product-price">{{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency(Helper::getProductPrice($product->id)), 2) }}</span>
        @else
        <span class="product-price">{{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency($product->price), 2) }}</span>
        @endif
    </div>
    <!-- End .price-box -->
    <div class="product-action">
        <a href="#" class="btn-icon btn-add-cart product-type-simple" data-id="{{ $product->id }}">
            <i class="icon-shopping-cart"></i>
            <span>{{ __('title.buttons.add_to_cart') }}</span>
        </a>
        @auth
            @if(Helper::checkIfWishlist($product->id))
            <a href="{{ route('wishlist', app()->getLocale()) }}" class="btn-icon-wish added-wishlist" title="{{ __('title.buttons.view_wishlist') }}">
                <i class="icon-heart"></i>
            </a>
            @else
            <a href="{{ route('wishlist', app()->getLocale()) }}" class="btn-icon-wish" data-id="{{ $product->id }}" title="{{ __('title.buttons.add_to_wishlist') }}">
                <i class="icon-heart"></i>
            </a>
            @endif
        @endauth
        <a href="{{ route('getQuickView', [app()->getLocale(), $product->id]) }}" class="btn-quickview" title="{{ __('title.buttons.quick_view') }}">
            <i class="fas fa-external-link-alt"></i>
        </a>
    </div>
</div>
