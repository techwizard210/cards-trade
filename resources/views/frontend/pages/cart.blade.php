@extends('frontend.layout.app')

@section('content')

<div class="container">

    <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
        <li class="active">
            <a href="{{ route('cart', app()->getLocale()) }}">{{ __('title.shopping_cart') }}</a>
        </li>
        <li>
            <a href="{{ route('checkout', app()->getLocale()) }}">{{ __('title.checkout') }}</a>
        </li>
        <li class="disabled">
            <span>{{ __('label.order_complete') }}</span>
        </li>
    </ul>

    <div class="row">
        <div class="col-lg-8">
            <div class="cart-table-container">
                <table class="table table-cart">
                    <thead>
                        <tr>
                            <th class="thumbnail-col"></th>
                            <th class="product-col">{{ __('label.product') }}</th>
                            <th class="price-col">{{ __('label.price') }}</th>
                            <th class="qty-col">{{ __('label.quantity') }}</th>
                            <th class="text-right">{{ __('label.subtotal') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($content as $list)
                        <tr class="product-row" data-id="{{ $list->id }}">
                            <td>
                                <figure class="product-image-container">
                                    <a href="{{ route('product-detail', [app()->getLocale(), $list->product->slug]) }}" class="product-image">
                                        @if(file_exists(public_path('products/'.$list->product->photo)) && !empty($list->product->photo))
                                        <img src="{{ asset('products/'.$list->product->photo) }}" alt="{{ $list->product->title }}" />
                                        @else
                                        <img src="{{ asset('assets/images/product-default.png') }}" alt="{{ $list->product->title }}" />
                                        @endif
                                    </a>
                                    <a href="javascript:;" class="btn-remove icon-cancel" title="Remove Product" data-id="{{ $list->id }}"></a>
                                </figure>
                            </td>
                            <td class="product-col">
                                <h5 class="product-title">
                                    <a href="{{ route('product-detail', [app()->getLocale(), $list->product->slug]) }}">{{ $list->product->title }}</a>
                                    @if($list->product->template == 'lens')
                                    <table class="table-cart-detail">
                                        <tr>
                                            <th></th>
                                            <th>{{ __('label.right') }}</th>
                                            @if($list->eye_diff == 'true')<th>{{ __('label.left') }}</th>@endif
                                        </tr>
                                        <tr>
                                            <td>SPH</td>
                                            <td>{{ $list->SPH_r }}</td>
                                            @if($list->eye_diff == 'true')<td>{{ $list->SPH_l }}</td>@endif
                                        </tr>
                                        <tr>
                                            <td>Radius</td>
                                            <td>{{ $list->RAD_r }}mm</td>
                                            @if($list->eye_diff == 'true')<td>{{ $list->RAD_l }}mm</td>@endif
                                        </tr>
                                        <tr>
                                            <td>{{ __('label.diameter') }}</td>
                                            <td>{{ $list->DIA_r }}mm</td>
                                            @if($list->eye_diff == 'true')<td>{{ $list->DIA_l }}mm</td>@endif
                                        </tr>
                                        <tr>
                                            <td>AXIS</td>
                                            <td>{{ $list->AXIS_r }}</td>
                                            @if($list->eye_diff == 'true')<td>{{ $list->AXIS_l }}</td>@endif
                                        </tr>
                                        <tr>
                                            <td>CYL</td>
                                            <td>{{ $list->CYL_r }}</td>
                                            @if($list->eye_diff == 'true')<td>{{ $list->CYL_l }}</td>@endif
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">{{ __('label.quantity') }}</td>
                                            <td class="font-weight-bold">{{ $list->quantity_r }}</td>
                                            @if($list->eye_diff == 'true')<td class="font-weight-bold">{{ $list->quantity_l }}</td>@endif
                                        </tr>
                                    </table>
                                    @endif
                                    @if($list->product->template == 'contact_lens')
                                    <table class="table-cart-detail table-borderless">
                                        <tr>
                                            <td>Color:</td>
                                            <td>{{ $list->color }}</td>
                                        </tr>
                                        <tr>
                                            <td>Diopter:</td>
                                            <td>{{ $list->diopter }}</td>
                                        </tr>
                                    </table>
                                    @endif
                                </h5>
                            </td>
                            <td>{{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency(Helper::getCartItemPrice($list->id)), 2) }}</td>
                            <td>
                                <div class="product-single-qty">
                                    <input class="horizontal-quantity form-control quantity-control" type="text" value="{{ $list->quantity }}" data-price="{{ Helper::getCartItemPrice($list->id) }}">
                                </div>
                            </td>
                            <td class="text-right"><span class="subtotal-price">{{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency($list->quantity * Helper::getCartItemPrice($list->id)), 2) }}</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="5">
                                <div class="font-weight-semibold py-3">{{ __('message.cart_no_product') }}</div>
                                <a class="btn btn-primary btn-icon-right btn-md mt-3" href="{{ route('products', app()->getLocale()) }}">{{ __('title.buttons.continue_shopping') }}<i class="fa fa-arrow-right"></i></a>
                            </td>
                        </tr>
                        @endforelse

                    </tbody>


                    <tfoot>
                        <tr>
                            <td colspan="5" class="clearfix">
                                <div class="float-left">
                                    <div class="cart-discount"  @if(!session()->has('coupon')) style="display:none;" @endif>

                                        <form action="{{ route('coupon.apply', app()->getLocale()) }}" method="POST">
                                            @csrf
                                            <div class="input-group">
                                                <input type="text" name="code" class="form-control form-control-sm"
                                                    placeholder="{{ __('label.coupon_code') }}" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-sm" type="submit">{{ __('label.apply_coupon') }}</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div><!-- End .float-left -->

                                <div class="float-right">
                                    <button type="submit" class="btn btn-shop btn-update-cart" disabled>
                                        {{ __('label.update_cart') }}
                                    </button>
                                </div><!-- End .float-right -->
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- End .cart-table-container -->
        </div><!-- End .col-lg-8 -->

        <div class="col-lg-4">
            <div class="cart-summary">
                <h3 class="text-uppercase">{{ __('label.cart_totals') }}</h3>

                <table class="table table-totals">
                    <tbody>
                        <tr>
                            <td>{{ __('label.subtotal') }}</td>
                            <td>{{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency($sub_total), 2) }}</td>
                        </tr>

                        <tr class="cart-coupon" @if(!session()->has('coupon')) style="display:none;" @endif>
                            <td>
                                <h4>COUPON</h4>
                                    <button class="btn btn-link text-uppercase p-0 py-1" id="btn-remove-coupon">{{ __('title.buttons.cancel') }}</button>

                            </td>

                            <td>
                                {{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency(Helper::getCouponDiscount($sub_total)), 2) }}
                            </td>
                        </tr>

                        {{-- <tr>
                            <td colspan="2" class="text-left">
                                <h4>{{ __('label.shipping') }}</h4>

                                <div class="form-group form-group-custom-control">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="radio"
                                            checked>
                                        <label class="custom-control-label">FREE</label>
                                    </div>
                                </div>

                                @foreach($shipping_methods as $key => $list)
                                <div class="form-group form-group-custom-control">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="radio" class="custom-control-input">
                                        <label class="custom-control-label">{{ $list->name }}</label>
                                    </div><!-- End .custom-checkbox -->
                                </div>
                                @endforeach

                                <form action="#">
                                    <div class="form-group form-group-sm">
                                        <label>Shipping to <strong>NY.</strong></label>
                                        <div class="select-custom">
                                            <select class="form-control form-control-sm" id="cart-country">
                                                @foreach($countries as $list)
                                                <option value="{{ $list->id }}" @if($list->id == 214) selected @endif>{{ $list->name }}</option>
                                                @endforeach
                                            </select>
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .form-group -->

                                    <button type="submit" class="btn btn-shop btn-update-total">
                                        Update Totals
                                    </button>
                                </form>
                            </td>
                        </tr> --}}

                    </tbody>

                    <tfoot>
                        <tr>
                            <td>{{ __('label.total') }}</td>
                            <td>{{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency($total), 2) }}</td>
                        </tr>
                    </tfoot>
                </table>

                <div class="checkout-methods">
                    <a href="{{ route('checkout', app()->getLocale()) }}" class="btn btn-block btn-dark btn-cart-checkout">{{ __('label.proceed_to_checkout') }}
                        <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@push('page-scripts')

    <script type="text/javascript">
        $(document).ready(function(){

            // Remove Product from Cart
            $('.btn-remove').on('click', function(){

                var i = $(this).closest('tr');

                $.ajax({
                    type: "POST",
                    url: "{{ route('cart.remove', app()->getLocale()) }}",
                    data: {
                        id: $(this).attr('data-id'),
                    },
                    headers: {
                        'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')
                    },
                    success: function (response) {
                        if(response.status == 'error') {
                            toastr['error'](response.message);
                        }
                        else if(response.status == 'success'){
                            toastr['success'](response.message);
                            i.remove();
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

            // Product quantity change event
            $('.quantity-control').on('change', function(){
                $('.btn-update-cart').prop('disabled', false);
                let qua = $(this).val();
                let price = qua * $(this).attr('data-price');
                $(this).closest('tr').find('.subtotal-price').html('{{ Helper::getLocaleCurrency()->symbol }}' + price.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
            });

            // Update Cart
            $('.btn-update-cart').on('click', function(e){
                e.preventDefault();
                let items = [];
                $('.product-row').each(function(){
                    let name = $(this).attr('data-id');
                    let value = $(this).find('.quantity-control').val();
                    items.push({ 'id':name , 'quantity':value});
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('cart.update', app()->getLocale()) }}",
                    data: {
                        content: items,
                    },
                    headers: {
                        'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')
                    },
                    success: function (response) {
                        if(response.status == 'error') {
                            toastr['error'](response.message);
                        }
                        else if(response.status == 'success'){
                            toastr['success'](response.message);
                            $('.btn-update-cart').prop('disabled', true);
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

            // Remove Coupon
            $('#btn-remove-coupon').on('click', function(){

                $.ajax({
                    type: "POST",
                    url: "{{ route('coupon.remove', app()->getLocale()) }}",
                    headers: {
                        'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')
                    },
                    success: function (response) {
                        if(response.status == 'error') {
                            toastr['error'](response.message);
                        }
                        else if(response.status == 'success'){
                            toastr['success'](response.message);
                            $('.cart-coupon').hide();
                            $('.cart-discount').show();
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
