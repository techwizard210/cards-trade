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
        <a href="{{ route('products', app()->getLocale()).'?cat='.Helper::getProductCategory($product->category)->slug }}">{{ Helper::getProductCategory($product->category)->title }}</a>
    </div>
    <h3 class="product-title">
        <a href="{{ route('product-detail', [app()->getLocale(), $product->slug]) }}">{{ $product->title }}</a>
    </h3>
    <!-- End .product-container -->
    <p class="product-description">{!! strip_tags($product->summary) !!}</p>
    <div class="price-box">
        @if($product->discount_option > 1)
        <span class="old-price">${{ number_format($product->value, 2) }}</span>
        <span class="product-price">${{ number_format($product->value, 2) }}</span>
        @else
        <span class="product-price">${{ number_format($product->value, 2) }}</span>
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
