
<a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button"
    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
    <i class="icon-cart-thick"></i>
    <span class="cart-count badge-circle">{{ Helper::getCart()['cart_count'] }}</span>
</a>

<div class="cart-overlay"></div>

<div class="dropdown-menu mobile-cart">
    <a href="#" title="Close (Esc)" class="btn-close">×</a>

    <div class="dropdownmenu-wrapper custom-scrollbar">
        <div class="dropdown-cart-header">{{ __('title.shopping_cart') }}</div>
        <div class="dropdown-cart-products">
            @forelse (Helper::getCart()['cart'] as $list)
                <div class="product">
                    <div class="product-details">
                        <h4 class="product-title">
                            <a href="{{ route('product-detail', [app()->getLocale(), $list->product->slug]) }}">{{ $list->product->title }}</a>
                        </h4>
                        <span class="cart-product-info">
                            <span class="cart-product-qty">{{ $list->quantity }}</span>
                            × CHF {{ number_format($list->price, 2 ) }}
                        </span>
                    </div>

                    <figure class="product-image-container">
                        <a href="{{ route('product-detail', [app()->getLocale(), $list->product->slug]) }}" class="product-image">
                            @if(file_exists(public_path('products/'.$list->product->photo)))
                            <img src="{{ asset('products/'.$list->product->photo) }}" width="80" height="80" alt="{{ $list->product->title }}" />
                            @else
                            <img src="{{ asset('assets/images/product-default.png') }}" width="80" height="80" alt="{{ $list->product->title }}" />
                            @endif
                        </a>
                        <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                    </figure>
                </div>
            @empty

            @endforelse
        </div>

        <div class="dropdown-cart-total">
            <span class="text-uppercase">{{ __('label.subtotal') }}:</span>
            <span class="cart-total-price float-right">CHF {{ number_format(Helper::getCart()['subtotal'], 2) }}</span>
        </div>

        <div class="dropdown-cart-action">
            <a href="{{ route('cart', app()->getLocale()) }}" class="btn btn-gray btn-block view-cart">{{ __('title.buttons.view_cart') }}</a>
            <a href="{{ route('checkout', app()->getLocale()) }}" class="btn btn-dark btn-block">{{ __('title.checkout') }}</a>
        </div>
    </div>
</div>


