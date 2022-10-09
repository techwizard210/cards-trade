<div class="product-single-container product-single-default product-quick-view mb-0 custom-scrollbar">
	<div class="row">
		<div class="col-md-6 product-single-gallery mb-md-0">
			<div class="product-slider-container">
				<div class="label-group">
					{{-- <div class="product-label label-hot">HOT</div> --}}
                    @if($product->discount_option == 2)
                    <div class="product-label label-sale">-{{ $product->discount }}%</div>
                    @endif
                    @if($product->discount_option == 3)
                    <div class="product-label label-sale">-{{ round(100- ( $product->discounted_price / $product->price)*100) }}%</div>
                    @endif
				</div>

				<div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
					<div class="product-item">
                        @if(file_exists(public_path('products/'.$product->photo)))
                        <img class="product-single-image" src="{{ asset('products/'.$product->photo) }}" data-zoom-image="{{ asset('products/'.$product->photo) }}" alt="{{ $product->title }}" />
                        @else
                        <img class="product-single-image" src="{{ asset('assets/images/product-default.png') }}" data-zoom-image="{{ asset('assets/images/product-default.png') }}" alt="{{ $product->title }}" />
                        @endif
					</div>
                    @forelse ($product_images as $list)
                        @if(file_exists(public_path('products/'.$list->url)))
                        <div class="product-item">
                            <img class="product-single-image" src="{{ asset('products/'.$list->url) }}" data-zoom-image="{{ asset('products/'.$list->url) }}" alt="{{ $product->title }}" />
                        </div>
                        @endif
                    @empty
                    @endforelse
				</div>
			</div>
			<div class="prod-thumbnail owl-dots">
				<div class="owl-dot">
                    @if(file_exists(public_path('products/'.$product->photo)))
                    <img src="{{ asset('products/'.$product->photo) }}" alt="{{ $product->title }}" />
                    @else
                    <img src="{{ asset('assets/images/product-default.png') }}" alt="{{ $product->title }}" />
                    @endif
				</div>
                @forelse ($product_images as $list)
                    @if(file_exists(public_path('products/'.$list->url)))
                    <div class="owl-dot">
                        <img src="{{ asset('products/'.$list->url) }}" alt="{{ $product->title }}" />
                    </div>
                    @endif
                @empty
                @endforelse
			</div>
		</div>

		<div class="col-md-6">
			<div class="product-single-details mb-0 ml-md-4">
				<h1 class="product-title">{{ $product->title }}</h1>
				<div class="ratings-container">
					<div class="product-ratings">
						<span class="ratings" style="width:{{ Helper::getProductReview($product->id) }}%"></span>
					</div>
					<a href="#" class="rating-link">( {{ count($reviews) }} {{ __('label.reviews') }} )</a>
				</div>

				<hr class="short-divider">

				<div class="price-box">
                    @if($product->discount_option > 1)
                    <span class="old-price">{{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency($product->price), 2) }}</span>
                    <span class="product-price">{{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency(Helper::getProductPrice($product->id)), 2) }}</span>
                    @else
                    <span class="product-price">{{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency($product->price), 2) }}</span>
                    @endif
				</div>

				<div class="product-desc">
					<p>{!! ($product->summary) !!}</p>
				</div>

				<ul class="single-info-list">

                    <li>
                        @if($product->stock>0)
                        <span class="badge badge-success badge-md">{{ __('label.in_stock') }}</span>
                        @else
                        <span class="badge badge-danger badge-md">{{ __('label.out_of_stock') }}</span>
                        @endif
                    </li>

					<li>
						SKU:
						<strong>{{ $product->SKU }}</strong>
					</li>
                    <li>
                        UPC:
                        <strong>{{ $product->UPC }}</strong>
                    </li>

					<li>
						{{ __('label.category') }}:
						<strong>
                            <a class="product-category" href="{{ route('products', app()->getLocale()).'?cat='.Helper::getProductCategory($product->cat_id)->slug }}">{{ Helper::getProductCategory($product->cat_id)->title }}</a>
                            @if(!empty($product->child_cat_id)) ,
                            <a class="product-category" href="{{ route('products', app()->getLocale()).'?cat='.Helper::getProductCategory($product->child_cat_id)->slug }}">{{ Helper::getProductCategory($product->child_cat_id)->title }}</a>
                            @endif
						</strong>
					</li>
				</ul>

				<div class="product-action">
					<a href="{{ route('product-detail', [app()->getLocale(), $product->slug])}}" class="btn btn-dark mr-2" title="{{ __('label.buy_now') }}">{{ __('label.buy_now') }}</a>
				</div>

				<hr class="divider mb-0 mt-0">

				<div class="product-single-share mb-0">
					<label class="sr-only">Share:</label>

					<div class="social-icons mr-2">
						<a href="#" class="social-icon social-facebook icon-facebook" target="_blank"
							title="Facebook"></a>
						<a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
						<a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"
							title="Linkedin"></a>
						<a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank"
							title="Google +"></a>
						<a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>
					</div>

                    @auth
                    @if(Helper::checkIfWishlist($product->id))
					<a href="{{ route('wishlist', app()->getLocale()) }}" class="btn-icon-wish add-wishlist added-wishlist" title="{{ __('title.buttons.view_wishlist') }}">
                        <i class="icon-wishlist-2"></i>
                        <span>{{ __('title.buttons.view_wishlist') }}</span>
                    </a>
                    @else
                    <a href="{{ route('wishlist', app()->getLocale()) }}" class="btn-icon-wish add-wishlist" data-id="{{ $product->id }}" title="{{ __('title.buttons.add_to_wishlist') }}">
                        <i class="icon-wishlist-2"></i>
                        <span>{{ __('title.buttons.add_to_wishlist') }}</span>
                    </a>
                    @endif
                    @endauth
				</div>
			</div>
		</div>

		<button title="Close (Esc)" type="button" class="mfp-close">x</button>
	</div>
</div>
