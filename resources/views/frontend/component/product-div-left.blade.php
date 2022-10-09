<div class="product-default left-details product-widget">
    <figure>
        <a href="{{ route('product-detail', [app()->getLocale(), $product->slug]) }}">
            @if(file_exists(public_path('products/'.$product->photo)) && !empty($product->photo))
            <img src="{{ asset('products/'.$product->photo) }}" width="95" height="95" alt="{{ $product->title }}" />
            @else
            <img src="{{ asset('assets/images/product-default.png') }}" width="95" height="95" alt="{{ $product->title }}" />
            @endif
        </a>
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
        <div class="price-box">
            @if($product->discount_option > 1)
            <del class="old-price">{{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency($product->price), 2) }}</del><br>
            <span class="product-price">{{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency(Helper::getProductPrice($product->id)), 2) }}</span>
            @else
            <span class="product-price">{{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency($product->price), 2) }}</span>
            @endif
        </div>
    </div>
</div>
