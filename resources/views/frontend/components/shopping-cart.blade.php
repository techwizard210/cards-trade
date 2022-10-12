<div class="cart-overlay"></div>
<a href="#" class="cart-toggle label-down link">
    <i class="w-icon-cart">
        <span class="cart-count">{{ Helper::getCart()['cart_count'] }}</span>
    </i>
    <span class="cart-label">Cart</span>
</a>
<div class="dropdown-box">
    <div class="cart-header">
        <span>Shopping Cart</span>
        <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
    </div>

    <div class="products">
        @forelse (Helper::getCart()['cart'] as $list)
        <div class="product product-cart">
            <div class="product-detail">
                <a href="#" class="product-name">@auth {{ $list->merchant->name }}@else {{ $list->name }} @endauth</a>
                <div class="price-box">
                    <span class="product-quantity">@auth {{ $list->quantity }}@else 1 @endauth</span>
                    <span class="product-price">$@auth {{ number_format($list->merchant->value, 2) }}@else {{ number_format($list->value, 2) }} @endauth</span>
                </div>
            </div>
            @php if(Auth::check()) $img = $list->merchant->image; else $img =  $list->image; @endphp
            <figure class="product-media">
                <a href="#">
                    @if(file_exists(public_path('storage/cards/'.$img)) && !empty($img))
                    <img src="{{ asset('storage/cards/'.$img) }}" alt="{{ $list->name }}" width="84" height="94" />
                    @else
                    <img src="{{ asset('user-assets/images/default-card.png') }}" width="84" height="94" alt="{{ $list->name }}" />
                    @endif
                </a>
            </figure>
            <button class="btn btn-link btn-close btn-remove-item-cart" aria-label="button" data-id="{{ $list->merchant->id }}">
                <i class="fas fa-times"></i>
            </button>
        </div>
        @empty
        <div class="text-center pt-4">No Cart Items</div>
        @endforelse

    </div>

    <div class="cart-total">
        <label>Subtotal:</label>
        <span class="price" id="side-cart-subtotal">${{ number_format(Helper::getCart()['subtotal'])}}</span>
    </div>

    <div class="cart-action">
        <a href="{{ route('cart') }}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
        <a href="{{ route('checkout') }}" class="btn btn-primary  btn-rounded">Checkout</a>
    </div>
</div>
