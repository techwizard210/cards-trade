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
        @php if(Auth::check()) $data = $list->product; else $data = $list; @endphp
        <div class="product product-cart">
            <div class="product-detail">
                <a href="{{ route('product.detail', $data->merchant->id) }}" class="product-name">{{ $data->merchant->name }}</a>
                <div class="price-box">
                    <span class="product-quantity">{{ $data->quantity }}</span>
                    <span class="product-price">${{ number_format($data->value * (100 - $data->discount) / 100, 2) }}</span>
                </div>
            </div>
            <figure class="product-media">
                <a href="{{ route('product.detail', $data->merchant->id) }}">
                    @if(file_exists(public_path('storage/cards/'.$data->merchant->image)) && !empty($data->merchant->image))
                    <img src="{{ asset('storage/cards/'.$data->merchant->image) }}" alt="{{ $data->merchant->name }}" width="84" height="94" />
                    @else
                    <img src="{{ asset('user-assets/images/default-card.png') }}" width="84" height="94" alt="{{ $data->merchant->name }}" />
                    @endif
                </a>
            </figure>
            <button class="btn btn-link btn-close btn-remove-item-cart" aria-label="button" data-id="{{ $data->id }}">
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
