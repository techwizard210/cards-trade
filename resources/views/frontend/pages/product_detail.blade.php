@extends('frontend.layout.app')

@section('content')

<div class="container">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home', app()->getLocale()) }}"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.type', [app()->getLocale(), Helper::getProType($product_detail->template)->slug]) }}">{{ Helper::getProType($product_detail->template)->title }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.type', [app()->getLocale(), Helper::getProType($product_detail->template)->slug]).'?cat='.$product_detail->cat_info['slug'] }}">{{ $product_detail->cat_info['title'] }}</a></li>
            @if(!empty($product_detail->sub_cat_info['title']))
            <li class="breadcrumb-item"><a href="#">{{ $product_detail->sub_cat_info['title'] }}</a></li>
            @endif
            <li class="breadcrumb-item active"><span>{{ $product_detail->title }}</span></li>
        </ol>
    </nav>

    <div class="product-single-container product-single-default">
        <div class="cart-message d-none">
            <strong class="single-cart-notice">“{{ $product_detail->title }}”</strong>
            <span> {{ __('message.shop.added_into_cart') }}</span>
        </div>

        <div class="row">
            <div class="col-lg-5 col-md-6 product-single-gallery">
                <div class="product-slider-container">
                    <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                        <div class="product-item">
                            @if(file_exists(public_path('products/'.$product_detail->photo)) && !empty($product_detail->photo))
                            <img class="product-single-image" src="{{ asset('products/'.$product_detail->photo) }}" data-zoom-image="{{ asset('products/'.$product_detail->photo) }}" width="468" height="468" alt="{{ $product_detail->title }}" />
                            @else
                            <img class="product-single-image" src="{{ asset('assets/images/product-default.png') }}" data-zoom-image="{{ asset('assets/images/product-default.png') }}" width="468" height="468" alt="{{ $product_detail->title }}" />
                            @endif
                        </div>
                        @forelse ($product_images as $list)
                        @if(file_exists(public_path('products/'.$list->url)) && !empty($list->url))
                        <div class="product-item">
                            <img class="product-single-image" src="{{ asset('products/'.$list->url) }}" data-zoom-image="{{ asset('products/'.$list->url) }}" width="468" height="468" alt="{{ $product_detail->title }}" />
                        </div>
                        @endif
                        @empty
                        @endforelse
                    </div>
                    <span class="prod-full-screen">
                        <i class="icon-plus"></i>
                    </span>
                </div>
                <div class="prod-thumbnail owl-dots">
                    <div class="owl-dot">
                        @if(file_exists(public_path('products/'.$product_detail->photo)) && !empty($product_detail->photo))
                        <img src="{{ asset('products/'.$product_detail->photo) }}" width="110" height="110" alt="{{ $product_detail->title }}" />
                        @else
                        <img src="{{ asset('assets/images/product-default.png') }}" width="110" height="110" alt="{{ $product_detail->title }}" />
                        @endif
                    </div>
                    @forelse ($product_images as $list)
                        @if(file_exists(public_path('products/'.$list->url)))
                        <div class="owl-dot">
                            <img src="{{ asset('products/'.$list->url) }}" width="110" height="110" alt="{{ $product_detail->title }}" />
                        </div>
                        @endif
                        @empty
                        @endforelse
                </div>
            </div>

            <div class="col-lg-7 col-md-6 product-single-details">
                <div class="d-flex align-items-center">
                    @empty(Helper::getBrandInfo($product_detail->brand_id)->brand_logo)
                    @else
                    <div class="brand-logo">
                        <img src="{{ asset('brands/'.Helper::getBrandInfo($product_detail->brand_id)->brand_logo) }}">
                    </div>
                    @endif
                    <div class="mt-2">
                        <h1 class="product-title mb-0">{{ $product_detail->title }}</h1>
                        <h5 class="text-muted">{{ Helper::getBrandInfo($product_detail->brand_id)->title }} | {{ $product_detail->cat_info['title'] }} | {{ $product_detail->title }}</h5>
                    </div>
                </div>

                <div class="product-nav">
                    @if(!empty($previous))
                    <div class="product-prev">
                        <a href="{{ route('product-detail', [app()->getLocale(), $previous->slug]) }}">
                            <span class="product-link"></span>
                            <span class="product-popup">
                                <span class="box-content">
                                    @if(file_exists(public_path('products/'.$previous->photo)) && !empty($previous->photo))
                                    <img src="{{ asset('products/'.$previous->photo) }}" width="150" height="150" style="padding-top: 0px;" alt="{{ $previous->title }}" />
                                    @else
                                    <img src="{{ asset('assets/images/product-default.png') }}" width="150" height="150" style="padding-top: 0px;" alt="{{ $previous->title }}" />
                                    @endif
                                    <span>{{ $previous->title }}</span>
                                </span>
                            </span>
                        </a>
                    </div>
                    @endif
                    @if(!empty($next))
                    <div class="product-next">
                        <a href="{{ route('product-detail', [app()->getLocale(), $next->slug]) }}">
                            <span class="product-link"></span>
                            <span class="product-popup">
                                <span class="box-content">
                                    @if(file_exists(public_path('products/'.$next->photo)) && !empty($next->photo))
                                    <img src="{{ asset('products/'.$next->photo) }}" width="150" height="150" style="padding-top: 0px;" alt="{{ $next->title }}" />
                                    @else
                                    <img src="{{ asset('assets/images/product-default.png') }}" width="150" height="150" style="padding-top: 0px;" alt="{{ $next->title }}" />
                                    @endif
                                    <span>{{ $next->title }}</span>
                                </span>
                            </span>
                        </a>
                    </div>
                    @endif
                </div>

                <div class="ratings-container">
                    <div class="product-ratings">
                        <span class="ratings" style="width:{{ Helper::getProductReview($product_detail->id) }}%"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="#" class="rating-link">( {{ count($reviews) }} {{ __('label.reviews') }} )</a>
                </div>

                <hr class="short-divider">

                <div class="price-box">
                    @if($product_detail->discount_option > 1)
                    <span class="old-price">{{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency($product_detail->price), 2) }}</span>
                    <span class="new-price">{{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency(Helper::getProductPrice($product_detail->id)), 2) }}</span>
                    @else
                    <span class="new-price">{{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency($product_detail->price), 2) }}</span>
                    @endif
                </div>

                <div class="product-desc">
                    <p>{!! ($product_detail->summary) !!}</p>
                </div>

                <ul class="single-info-list">
                    <li>
                        @if( $product_detail->stock > 0 )
                        <span class="badge badge-success badge-md">{{ __('label.in_stock') }}</span>
                        @else
                        <span class="badge badge-danger badge-md">{{ __('label.out_of_stock') }}</span>
                        @endif
                    </li>
                    <li>
                        SKU:
                        <strong>{{ $product_detail->SKU }}</strong>
                    </li>
                    <li>
                        UPC:
                        <strong>{{ $product_detail->UPC }}</strong>
                    </li>

                    <li>
                        {{ __('label.category') }}:
                        <strong>
                            <a href="#" class="product-category">{{ $product_detail->cat_info['title'] }}</a>
                        </strong>
                    </li>
                    @if(!empty($product_detail->sub_cat_info['title']))
                    <li>
                        {{ __('label.subcategory') }}:
                        <strong>
                            <a href="#" class="product-category">{{ $product_detail->sub_cat_info['title'] }}</a>
                        </strong>
                    </li>
                    @endif

                    {{-- <li>
                        TAGs:
                        <strong><a href="#" class="product-category">Jeep</a></strong>,
                        <strong><a href="#" class="product-category">Nissan</a></strong>
                    </li> --}}
                </ul>

                @if($product_detail->template == 'lens' || $product_detail->template == 'contact_lens')
                <hr class="divider mb-2 mt-0">
                @endif

                <form id="product-attr-form" class="m-0">
                    <input id="product_id" name="product_id" value="{{ $product_detail->id }}" hidden />
                    <input id="product_type" name="product_type" value="{{ $product_detail->template }}" hidden />
                </form>

                @if($product_detail->template == 'lens')
                <div class="container">
                    <div class="form-group">
                        <div class="custom-control custom-checkbox mt-0 mb-0">
                            <input type="checkbox" class="custom-control-input form-attr" name="diff_eye" id="different-eye" value="1" />
                            <label class="custom-control-label" data-toggle="collapse" data-target="#collapseFour" aria-controls="collapseFour" for="different-eye">{{ __('message.shop.different_eye_msg') }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-responsive table-contact-lens-attr" style="width: 100%">
                                <thead>
                                    <th>Eye</th>
                                    @if(!empty($product_detail->SPH)) <th>SPH</th> @endif
                                    @if(!empty($product_detail->RAD)) <th>RAD</th> @endif
                                    @if(!empty($product_detail->DIA)) <th>DIA</th> @endif
                                    @if(!empty($product_detail->AXIS)) <th>AXIS</th> @endif
                                    @if(!empty($product_detail->CYL)) <th>CYL</th> @endif
                                    @if(!empty($product_detail->ADD)) <th>ADD</th> @endif
                                    <th>Quantity</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-uppercase">{{ __('label.right') }}</td>
                                        @if(!empty($product_detail->SPH))
                                        <td>
                                            <select class="form-control form-attr" name="SPH_r">
                                                @foreach(explode(',', $product_detail->SPH) as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        @endif
                                        @if(!empty($product_detail->RAD))
                                        <td>
                                            <div class="input-group">
                                                <select class="form-control form-attr" name="RAD_r">
                                                    @foreach(explode(',', $product_detail->RAD) as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">mm</span>
                                                </div>
                                            </div>
                                        </td>
                                        @endif
                                        @if(!empty($product_detail->DIA))
                                        <td>
                                            <div class="input-group">
                                                <select class="form-control form-attr" name="DIA_r">
                                                    @foreach(explode(',', $product_detail->DIA) as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">mm</span>
                                                </div>
                                            </div>
                                        </td>
                                        @endif
                                        @if(!empty($product_detail->AXIS))
                                        <td>
                                            <select class="form-control form-attr" name="AXIS_r">
                                                @foreach(explode(',', $product_detail->AXIS) as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        @endif
                                        @if(!empty($product_detail->CYL))
                                        <td>
                                            <select class="form-control form-attr" name="CYL_r">
                                                @foreach(explode(',', $product_detail->CYL) as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        @endif
                                        @if(!empty($product_detail->ADD))
                                        <td>
                                            <select class="form-control form-attr" name="ADD_r">
                                                @foreach(explode(',', $product_detail->ADD) as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        @endif
                                        <td>
                                            <select class="form-control form-attr" name="quantity_r">
                                                @for( $i = 1; $i <= 10 ; $i++ )
                                                <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="collapse" id="collapseFour">
                                        <td class="text-uppercase">{{ __('label.left') }}</td>
                                        @if(!empty($product_detail->SPH))
                                        <td>
                                            <select class="form-control form-attr" name="SPH_l">
                                                @foreach(explode(',', $product_detail->SPH) as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        @endif
                                        @if(!empty($product_detail->RAD))
                                        <td>
                                            <div class="input-group">
                                                <select class="form-control form-attr" name="RAD_l">
                                                    @foreach(explode(',', $product_detail->RAD) as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">mm</span>
                                                </div>
                                            </div>
                                        </td>
                                        @endif
                                        @if(!empty($product_detail->DIA))
                                        <td>
                                            <div class="input-group">
                                                <select class="form-control form-attr" name="DIA_l">
                                                    @foreach(explode(',', $product_detail->DIA) as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">mm</span>
                                                </div>
                                            </div>
                                        </td>
                                        @endif
                                        @if(!empty($product_detail->AXIS))
                                        <td>
                                            <select class="form-control form-attr" name="AXIS_l">
                                                @foreach(explode(',', $product_detail->AXIS) as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        @endif
                                        @if(!empty($product_detail->CYL))
                                        <td>
                                            <select class="form-control form-attr" name="CYL_l">
                                                @foreach(explode(',', $product_detail->CYL) as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        @endif
                                        @if(!empty($product_detail->ADD))
                                        <td>
                                            <select class="form-control form-attr" name="ADD_l">
                                                @foreach(explode(',', $product_detail->ADD) as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        @endif
                                        <td>
                                            <select class="form-control form-attr" name="quantity_l">
                                                @for( $i = 1; $i <= 10 ; $i++ )
                                                <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif

                @if($product_detail->template == 'contact_lens')
                <div class="container">
                    @if(!empty($product_detail->colors))
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">{{ __('label.color_selection') }}</label>
                        <div class="input-group col-sm-6">
                            <select class="form-control form-attr">
                                @foreach(explode(',', $product_detail->colors) as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif
                    @if(!empty($product_detail->SPH))
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">{{ __('label.diopter') }}</label>
                        <div class="input-group col-sm-6">
                            <select class="form-control form-attr">
                                @foreach(explode(',', $product_detail->SPH) as $item)
                                <option value="{{ number_format($item, 2) }}">{{ number_format($item, 2) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif
                </div>
                @endif

                <div class="product-action">
                    @if($product_detail->template == 'lens')
                        <input class="form-control form-attr" name="quantity" type="text" id="product-quantity" value="1" hidden />
                    @else
                    <div class="product-single-qty">
                        <input class="horizontal-quantity form-control form-attr" name="quantity" type="text" id="product-quantity">
                    </div>
                    @endif

                    <a href="javascript:;" class="btn btn-dark add-cart mr-2" title="{{ __('label.add_to_cart') }}" data-id="{{ $product_detail->id }}">{{ __('label.add_to_cart') }}</a>

                    <a href="{{ route('cart', app()->getLocale()) }}" class="btn btn-gray view-cart d-none">{{ __('label.view_cart') }}</a>
                </div><!-- End .product-action -->

                <hr class="divider mb-0 mt-0">

                <div class="product-single-share mb-2">
                    <label class="sr-only">Share:</label>

                    <div class="social-icons mr-2">
                        <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"
                            title="Facebook"></a>
                        <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"
                            title="Twitter"></a>
                        <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"
                            title="Linkedin"></a>
                        <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank"
                            title="Google +"></a>
                        <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank"
                            title="Mail"></a>
                    </div><!-- End .social-icons -->

                    @auth
                    @if(Helper::checkIfWishlist($product_detail->id))
					<a href="{{ route('wishlist', app()->getLocale()) }}" class="btn-icon-wish add-wishlist added-wishlist" title="{{ __('title.buttons.view_wishlist') }}">
                        <i class="icon-wishlist-2"></i>
                        <span>{{ __('title.buttons.view_wishlist') }}</span>
                    </a>
                    @else
                    <a href="{{ route('wishlist', app()->getLocale()) }}" class="btn-icon-wish add-wishlist" data-id="{{ $product_detail->id }}" title="{{ __('title.buttons.add_to_wishlist') }}">
                        <i class="icon-wishlist-2"></i>
                        <span>{{ __('title.buttons.add_to_wishlist') }}</span>
                    </a>
                    @endif
                    @endauth

                </div><!-- End .product single-share -->
            </div><!-- End .product-single-details -->
        </div><!-- End .row -->
    </div><!-- End .product-single-container -->

    <div class="product-single-tabs">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="product-tab-desc" data-toggle="tab"
                    href="#product-desc-content" role="tab" aria-controls="product-desc-content"
                    aria-selected="true">{{ __('label.description') }}</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content"
                    role="tab" aria-controls="product-tags-content" aria-selected="false">{{ __('label.additional_info') }}</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">
                    {{ __('label.reviews') }} ({{ count($reviews) }})
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel"
                aria-labelledby="product-tab-desc">
                <div class="product-desc-content">
                    {!! ($product_detail->description) !!}
                </div>
            </div>
            <div class="tab-pane fade" id="product-tags-content" role="tabpanel"
                aria-labelledby="product-tab-tags">
                <table class="table table-striped mt-2">
                    <tbody>
                        <tr>
                            <th>Weight</th>
                            <td>23 kg</td>
                        </tr>

                        <tr>
                            <th>Dimensions</th>
                            <td>12 × 24 × 35 cm</td>
                        </tr>

                        <tr>
                            <th>Color</th>
                            <td>Black, Green, Indigo</td>
                        </tr>

                        <tr>
                            <th>Size</th>
                            <td>Large, Medium, Small</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="product-reviews-content" role="tabpanel"
                aria-labelledby="product-tab-reviews">
                <div class="product-reviews-content">
                    @if(count($reviews)>0)
                    <h3 class="reviews-title">{{ __('message.review.msg_for', ['count'=>count($reviews), 'name'=>$product_detail->title]) }}</h3>
                    <div class="comment-list">
                        @forelse ($reviews as $list)
                        <div class="comments pb-3">
                            <figure class="img-thumbnail">
                                @if(!empty($list->user_photo) && file_exists(public_path('users/'.$list->user_photo)))
                                <img class="rounded" src="{{ asset('users/'.$list->user_photo) }}" width="80" height="80" alt="{{ $list->user_name }}">
                                @else
                                <img class="rounded" src="{{ asset('assets/images/default-user.png') }}" width="80" height="80" alt="{{ $list->user_name }}">
                                @endif
                            </figure>
                            <div class="comment-block">
                                <div class="comment-header">
                                    <div class="comment-arrow"></div>
                                    <div class="ratings-container float-sm-right">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:{{ $list->rate/5*100 }}%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                    <span class="comment-by">
                                        <strong>{{ $list->user_name }}</strong> – {{ date_format($list->created_at, 'M d, Y') }}
                                    </span>
                                </div>
                                <div class="comment-content">
                                    <p>{{ $list->review }}</p>
                                </div>
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                    @else
                    <h3 class="font-weight-normal text-center">{{ __('message.review.msg_no_review') }}</h3>
                    @endif

                    <div class="divider"></div>

                    <div class="add-product-review">
                        <h3 class="review-title">{{ __('message.review.add_review') }}</h3>
                        @auth
                        <form action="#" class="comment-form m-0">
                            <div class="rating-form">
                                <label for="rating">Your rating <span class="required">*</span></label>
                                <span class="rating-stars">
                                    <a class="star-1" href="#">1</a>
                                    <a class="star-2" href="#">2</a>
                                    <a class="star-3" href="#">3</a>
                                    <a class="star-4" href="#">4</a>
                                    <a class="star-5" href="#">5</a>
                                </span>

                                <select name="rating" id="rating" required="" style="display: none;">
                                    <option value="">Rate…</option>
                                    <option value="5">Perfect</option>
                                    <option value="4">Good</option>
                                    <option value="3">Average</option>
                                    <option value="2">Not that bad</option>
                                    <option value="1">Very poor</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Your review <span class="required">*</span></label>
                                <textarea cols="5" rows="6" class="form-control form-control-sm"></textarea>
                            </div><!-- End .form-group -->

                            <input type="submit" class="btn btn-primary" value="Submit">
                        </form>
                        @else
                        <div class="cta-simple cta-border">
                            <h3 class="font-weight-normal">{{ __('message.review.msg_notice') }}</h3>
                            <a href="{{ route('login', app()->getLocale()) }}" class="btn btn-lg btn-primary px-5 mr-3 text-uppercase">{{ __('title.login') }}</a>
                            <a href="{{ route('register', app()->getLocale()) }}" class="btn btn-lg btn-success px-5 text-uppercase">{{ __('title.register') }}</a>
                        </div>
                        @endauth
                    </div><!-- End .add-product-review -->
                </div><!-- End .product-reviews-content -->
            </div><!-- End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .product-single-tabs -->

    <div class="products-section pt-0">
        <h2 class="section-title">{{ __('label.related_products') }}</h2>
        <div class="products-slider owl-carousel owl-theme dots-top dots-small dots-simple">
            @each('frontend.component.product-div', $product_detail->rel_prods, 'product')
        </div>
    </div>

</div>

@endsection

@push('page-scripts')

<script type="text/javascript">

    $(document).ready(function(){

        var getPriceByQuantity = function()
        {
            let quantity = $('#product-quantity').val();
            let product_type = $('#product_type').val();
            let product_id = $('#product_id').val();

            if(product_type == 'lens') {
                if($('input[name="diff_eye"]').is(':checked')) {
                    quantity *= parseInt($('.form-control[name="quantity_r"]').val()) +  parseInt($('.form-control[name="quantity_l"]').val());
                } else {
                    quantity *= $('.form-control[name="quantity_r"]').val();
                }
            }

            $.ajax({
                type: "POST",
                url: "{{ route('getPriceByQuantity', app()->getLocale()) }}",
                data: {
                    product_id: product_id,
                    quantity: quantity
                },
                headers: {
                    'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')
                },
                success: function (response) {
                    if(response.status == 'error') {
                        toastr['error'](response.message);
                    }
                    else if(response.status == 'success'){
                        $('.new-price').html(response.new_price);
                        if(response.discount > 1) $('.old-price').html(response.old_price);
                    } else {
                        toastr['warning'](JSON_MESSAGE.response.something_wrong);
                    }
                },
                error: function(response) {
                    toastr['error'](JSON_MESSAGE.response.unknown_error);
                }
            });

        };

        $('.form-control[name="quantity_r"]').on('change', function(){
            getPriceByQuantity();
        });

        $('.form-control[name="quantity_l"]').on('change', function(){
            getPriceByQuantity();
        });

        $('#product-quantity').on('change', function(e) {
            getPriceByQuantity();
        });

        $('input[name="diff_eye"]').on('change', function(){
            getPriceByQuantity();
        });

        $('.add-cart').on("click", function (t) {
            t.preventDefault();
            $btnView = $('.view-cart'), $cartMessage = $('.cart-message');
            $(this).hasClass("disabled") || $(this).addClass("added-to-cart"), $btnView.removeClass("d-none"), $cartMessage.removeClass("d-none");
            var i = $(this).closest(".product-default").length > 0 ? $(this).closest(".product-default") : $(this).closest(".product-row");
            var form_data = $('#product-attr-form').serializeArray();

            $('.form-attr').each(function ( index ) {
                let name = $(this).attr('name');
                let value = $(this).val();
                if(name == 'diff_eye') value =  $(this).is(':checked');
                form_data.push({ name , value});
            });

            $.ajax({
                type: "POST",
                url: "{{ route('add-to-cart', app()->getLocale()) }}",
                data: form_data,
                headers: {
                    'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')
                },
                success: function (response) {
                    if(response.status == 'error') {
                        toastr['error'](response.message);
                    }
                    else if(response.status == 'success'){

                        $('#div-shopping-cart').html(response.cart);
                        $(".cart-toggle").click(function () {
                            $("body").toggleClass("cart-opened");
                        }),
                        $(".btn-close").click(function () {
                            $("body").toggleClass("cart-opened");
                            }),
                            $(".box-close").click(function () {
                                $(this).parent().remove();
                            }),
                            $(".cart-overlay").click(function (e) {
                                $("body").removeClass("cart-opened");
                            });
                    } else {
                        toastr['warning'](JSON_MESSAGE.response.something_wrong);
                    }
                },
                error: function(response) {
                    toastr['error'](JSON_MESSAGE.response.unknown_error);
                }
            });
        });

    });

</script>

@endpush
