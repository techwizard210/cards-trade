@extends('frontend.layout.app')

@section('content')

<div class="container checkout-container">
    <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
        <li>
            <a href="{{ route('cart', app()->getLocale()) }}">{{ __('title.shopping_cart') }}</a>
        </li>
        <li class="active">
            <span>{{ __('title.checkout') }}</span>
        </li>
        <li class="disabled">
            <span>{{ __('label.order_complete') }}<span>
        </li>
    </ul>
    {{-- <div class="login-form-container">
        <h4>Returning customer?
            <button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="btn btn-link btn-toggle">Login</button>
        </h4>

        <div id="collapseOne" class="collapse">
            <div class="login-section feature-box">
                <div class="feature-box-content">
                    <form action="#" id="login-form">
                        <p>
                            If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing & Shipping section.
                        </p>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="mb-0 pb-1">Username or email <span
                                            class="required">*</span></label>
                                    <input type="email" class="form-control" required />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="mb-0 pb-1">Password <span
                                            class="required">*</span></label>
                                    <input type="password" class="form-control" required />
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn">LOGIN</button>

                        <div class="form-footer mb-1">
                            <div class="custom-control custom-checkbox mb-0 mt-0">
                                <input type="checkbox" class="custom-control-input" id="lost-password" />
                                <label class="custom-control-label mb-0" for="lost-password">Remember
                                    me</label>
                            </div>

                            <a href="forgot-password.html" class="forget-password">Lost your password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    @if(session()->has('success'))
    <div class="alert alert-rounded alert-success alert-dismissible">
        <span>{{ session('success') }}</span>
    </div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-rounded alert-danger alert-dismissible">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <span>{{ session('error') }}</span>
    </div>
    @endif

    <div class="checkout-discount" @if(session()->has('coupon')) style="display:none;" @endif>
        <h4>{{ __('message.home.have_coupon') }}
            <button data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne" class="btn btn-link btn-toggle text-uppercase">{{ __('message.home.enter_your_code') }}</button>
        </h4>

        <div id="collapseTwo" class="collapse mt-2">
            <div class="feature-box">
                <div class="feature-box-content">
                    <p>{{ __('message.home.coupon_msg') }}</p>
                    <form action="{{ route('coupon.apply', app()->getLocale()) }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm w-auto" name="code" placeholder="{{ __('label.coupon_code') }}" required="" />
                            <div class="input-group-append">
                                <button class="btn btn-primary btn-sm mt-0 text-uppercase" type="submit">
                                    {{ __('label.apply_coupon') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-7">
            <ul class="checkout-steps">
                <li>
                    <h2 class="step-title mb-2">{{ __('label.billing_details') }}</h2>

                    <form action="{{ route('checkout.submit', app()->getLocale()) }}" id="checkout-form" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('label.first_name') }}
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="first_name" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('label.last_name') }}
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="last_name" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{{ __('label.company_name') }} ({{ __('label.optinoal') }})</label>
                            <input type="text" class="form-control" name="company_name" />
                        </div>

                        <div class="form-group">
                            <label>{{ __('label.country') }}
                                <span class="required">*</span>
                            </label>
                            <select name="country" class="form-control" id="select_country">
                                @foreach($countries as $list)
                                <option value="{{ $list->id }}" {{ $country_id == $list->id ? 'selected' : '' }}>{{ $list->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>{{ __('label.state') }}
                                <span class="required">*</span>
                            </label>
                            <select name="state" class="form-control">
                                @foreach($states as $list)
                                <option value="{{ $list->id }}">{{ $list->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>{{ __('label.city') }}
                                <span class="required">*</span>
                            </label>
                            <input type="text" name="city" class="form-control" />
                        </div>

                        <div class="form-group mb-1 pb-2">
                            <label>{{ __('label.street') }}
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="form-control" placeholder="{{ __('label.address1') }}"  name="address1" />
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="{{ __('label.address2') }} ({{ __('label.optinoal') }})"  name="address2" />
                        </div>

                        <div class="form-group">
                            <label>{{ __('label.postcode') }} / ZIP
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="form-control"  name="post_code" />
                        </div>

                        <div class="form-group">
                            <label>{{ __('label.phone') }}
                                <span class="required">*</span>
                            </label>
                            <input type="tel" class="form-control"  name="phone" />
                        </div>

                        <div class="form-group">
                            <label>{{ __('label.email_address') }}
                                <span class="required">*</span>
                            </label>
                            <input type="email" class="form-control"  name="email" />
                        </div>


                        {{-- <div class="form-group mb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="create-account" />
                                <label class="custom-control-label" data-toggle="collapse" data-target="#collapseThree" aria-controls="collapseThree" for="create-account">Create an
                                    account?</label>
                            </div>
                        </div>

                        <div id="collapseThree" class="collapse">
                            <div class="form-group">
                                <label>Create account password
                                    <abbr class="required" title="required">*</abbr></label>
                                <input type="password" placeholder="Password" class="form-control" required />
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <div class="custom-control custom-checkbox mt-0">
                                <input type="checkbox" class="custom-control-input" id="different-shipping" name="different_shipping" />
                                <label class="custom-control-label" data-toggle="collapse" data-target="#collapseFour" aria-controls="collapseFour" for="different-shipping">{{ __('message.home.ship_different_address') }}</label>
                            </div>
                        </div>

                        <div id="collapseFour" class="collapse">
                            <div class="shipping-info">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('label.first_name') }}
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="shipping_first_name" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('label.last_name') }}
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="shipping_last_name" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>{{ __('label.company_name') }} ({{ __('label.optinoal') }})</label>
                                    <input type="text" class="form-control" name="shipping_company_name" />
                                </div>

                                <div class="form-group">
                                    <label>{{ __('label.country') }}
                                        <span class="required">*</span>
                                    </label>
                                    <select name="shipping_country" class="form-control">
                                        @foreach($countries as $list)
                                        <option value="{{ $list->id }}" {{ $country_id == $list->id ? 'selected' : '' }}>{{ $list->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>{{ __('label.state') }}
                                        <span class="required">*</span>
                                    </label>
                                    <select name="shipping_state" class="form-control">
                                        @foreach($states as $list)
                                        <option value="{{ $list->id }}">{{ $list->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>{{ __('label.city') }}
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" name="shipping_city" class="form-control" />
                                </div>

                                <div class="form-group mb-1 pb-2">
                                    <label>{{ __('label.street') }}
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" placeholder="{{ __('label.address1') }}"  name="shipping_address1" />
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="{{ __('label.address2') }} ({{ __('label.optinoal') }})"  name="shipping_address2" />
                                </div>

                                <div class="form-group">
                                    <label>{{ __('label.postcode') }} / ZIP
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control"  name="shipping_post_code" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="order-comments">{{ __('label.order_notes') }} ({{ __('label.optinoal') }})</label>
                            <textarea class="form-control" placeholder="{{ __('message.home.order_comment_placeholder') }}" name="comment"></textarea>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
        <!-- End .col-lg-8 -->

        <div class="col-lg-5">
            <div class="order-summary">
                <h3 class="mb-2 text-uppercase">{{ __('label.order_summary') }}</h3>
                <table class="table table-mini-cart">
                    <thead>
                        <tr>
                            <th colspan="2" class="text-uppercase">{{ __('label.product') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($content as $item)
                        <tr>
                            <td class="product-col">
                                <h3 class="product-title">
                                    {{ $item->product->title }} ×
                                    <span class="product-qty">{{ $item->quantity }}</span>
                                </h3>
                            </td>

                            <td class="price-col">
                                <span>{{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency(Helper::getCartItemPrice($item->id) * $item->quantity), 2) }}</span>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr class="cart-subtotal">
                            <td>
                                <h4 class="text-uppercase">{{ __('label.subtotal') }}</h4>
                            </td>

                            <td class="price-col">
                                <span class="font-weight-bold">{{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency($subtotal), 2) }}</span>
                            </td>
                        </tr>
                        <tr class="cart-coupon" @if(!session()->has('coupon')) style="display:none;" @endif>
                            <td>
                                <h4>COUPON
                                    <button class="btn btn-link text-uppercase" id="btn-remove-coupon">{{ __('label.remove') }}</button>
                                </h4>
                            </td>

                            <td class="price-col">
                                <span class="font-weight-bold">{{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency(Helper::getCouponDiscount($subtotal)), 2) }}</span>
                            </td>
                        </tr>
                        <tr class="order-shipping">
                            <td class="text-left">
                                <h4 class="m-b-sm text-uppercase">{{ __('label.shipping') }}</h4>
                                <div class="div-shipping-methods">
                                @if($free_shipping == 'true')

                                <div class="form-group form-group-custom-control">
                                    <div class="custom-control custom-radio d-flex">
                                        <input type="radio" class="custom-control-input" form="checkout-form" name="shipping_method" checked value="0" />
                                        <label class="custom-control-label">FREE &nbsp;<span class="text-danger">{{ Helper::getLocaleCurrency()->symbol }}0.00</span></label>
                                    </div>
                                    <!-- End .custom-checkbox -->
                                </div>
                                @endif

                                @foreach($shipping_methods as $index => $list)
                                <div class="form-group form-group-custom-control">
                                    <div class="custom-control custom-radio d-flex">
                                        <input type="radio" name="shipping_method" form="checkout-form" class="custom-control-input" value="{{ $list->id }}" {{ ($shipping_id==$list->id)?'checked':'' }}>
                                        <label class="custom-control-label">{{ $list->name }} &nbsp;<span class="text-danger">{{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency(Helper::getCHF($list->value, $shipping->currency)), 2) }}</span></label>
                                    </div>
                                    <!-- End .custom-checkbox -->
                                </div>
                                @endforeach
                                </div>
                            </td>

                        </tr>

                        <tr class="order-total">
                            <td>
                                <h4 class="text-uppercase">{{ __('label.total') }}</h4>
                            </td>
                            <td>
                                <b class="total-price"><span>{{ Helper::getLocaleCurrency()->symbol }}{{ number_format(Helper::getPriceByCurrency($total), 2) }}</span></b>
                            </td>
                        </tr>
                        <tr class="order-shipping">
                            <td class="text-left">
                                <h4 class="m-b-sm text-uppercase">{{ __('label.payment_methods') }}</h4>

                                <div class="form-group form-group-custom-control">
                                    <div class="custom-control custom-radio d-flex">
                                        <input type="radio" class="custom-control-input" value="cod" name="payment" checked form="checkout-form" />
                                        <label class="custom-control-label">Bank Transfer</label>
                                    </div>
                                    <!-- End .custom-checkbox -->
                                </div>
                                <!-- End .form-group -->

                                <div class="form-group form-group-custom-control">
                                    <div class="custom-control custom-radio d-flex">
                                        <input type="radio" name="payment" value="paypal" class="custom-control-input" form="checkout-form" />
                                        <label class="custom-control-label">Paypal</label>
                                    </div>
                                    <!-- End .custom-checkbox -->
                                </div>
                                <img src="{{ asset('backend/img/payment-method.png')}}" alt="#">
                            </td>

                        </tr>
                    </tfoot>
                </table>

                <button type="submit" class="btn btn-dark btn-place-order" form="checkout-form">
                    {{ __('label.place_order') }}
                </button>
            </div>
            <!-- End .cart-summary -->
        </div>
        <!-- End .col-lg-4 -->
    </div>
</div>

@endsection

@push('page-scripts')

	<script type="text/javascript">
		$(document).ready(function(){

            $("#checkout-form").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    first_name: {
                        required: true
                    },
                    last_name: {
                        required: true
                    },
                    address1: {
                        required: true
                    },
                    phone: {
                        required: true
                    },
                    post_code: {
                        required: true
                    },
                    shipping_first_name: {
                        required: true
                    },
                    shipping_last_name: {
                        required: true
                    },
                    shipping_city: {
                        required: true
                    },
                    city: {
                        required: true
                    },
                    shipping_address1: {
                        required: true
                    },
                    shipping_post_code: {
                        required: true
                    },
                },
                messages: {
                    email: {
                        required: "{{ __('message.validation.required') }}",
                        email: "{{ __('message.validation.invalid_email') }}",
                    },
                    first_name: {
                        required: "{{ __('message.validation.required') }}",
                    },
                    last_name: {
                        required: "{{ __('message.validation.required') }}",
                    },
                    address1: {
                        required: "{{ __('message.validation.required') }}",
                    },
                    phone: {
                        required: "{{ __('message.validation.required') }}",
                    },
                    post_code: {
                        required: "{{ __('message.validation.required') }}",
                    },
                    shipping_first_name: {
                        required: "{{ __('message.validation.required') }}",
                    },
                    shipping_last_name: {
                        required: "{{ __('message.validation.required') }}",
                    },
                    shipping_city: {
                        required: "{{ __('message.validation.required') }}",
                    },
                    city: {
                        required: "{{ __('message.validation.required') }}",
                    },
                    shipping_address1: {
                        required: "{{ __('message.validation.required') }}",
                    },
                    shipping_post_code: {
                        required: "{{ __('message.validation.required') }}",
                    },
                },
            });

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
                            $('.checkout-discount').show();
                        } else {
                            toastr['warning'](JSON_MESSAGE.response.something_wrong);
                        }
                    },
                    error: function(response) {
                        toastr['error'](JSON_MESSAGE.response.unknown_error);
                    }
                });
            });

            $('body').on('change', 'input[name="shipping_method"]', function(){
                $.ajax({
                    type: "POST",
                    url: "{{ route('updateCartTotal', app()->getLocale()) }}",
                    data: {
                        shipping_id: $(this).val()
                    },
                    headers: {
                        'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')
                    },
                    success: function (response) {
                        if(response.status == 'error') {
                            toastr['error'](response.message);
                        }
                        else if(response.status == 'success'){
                            $('.total-price').find('span').html(response.total);
                        } else {
                            toastr['warning'](JSON_MESSAGE.response.something_wrong);
                        }
                    },
                    error: function(response) {
                        toastr['error'](JSON_MESSAGE.response.unknown_error);
                    }
                });
            });

            $('#select_country').on('change', function(){

                $.ajax({
                    type: "POST",
                    url: "{{ route('cart.getStates', app()->getLocale()) }}",
                    data: {
                        country_id: $(this).val()
                    },
                    headers: {
                        'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')
                    },
                    success: function (response) {
                        if(response.status == 'error') {
                            toastr['error'](response.message);
                        }
                        else if(response.status == 'success'){
                            let txt = ''
                            response.states.forEach(element => {
                                txt += '<option value="' + element.id + '">' + element.name + '</option>';
                            });
                            $('select[name="state"]').html(txt);
                            if(!$('#different-shipping').is(':checked')) {
                                $('select[name="shipping_country').val($('#select_country').val());
                                $('select[name="shipping_state"]').html(txt);

                                let txt1 = '';
                                if(response.is_free_shipping > 0) {
                                    txt1 = '<div class="form-group form-group-custom-control">\
                                        <div class="custom-control custom-radio d-flex">\
                                            <input type="radio" class="custom-control-input" form="checkout-form" name="shipping_method" checked value="0" />\
                                            <label class="custom-control-label">FREE &nbsp;<span class="text-danger">' + '{{ Helper::getLocaleCurrency()->symbol }}' + '0.00</span></label>\
                                        </div>\
                                    </div>';
                                }

                                response.shipping_methods.forEach((element, index) => {
                                    let tmp = '';
                                    if(index == 0 && response.is_free_shipping == 0) tmp = 'checked';
                                    txt1 += '<div class="form-group form-group-custom-control">\
                                        <div class="custom-control custom-radio d-flex">\
                                            <input type="radio" class="custom-control-input" form="checkout-form" name="shipping_method"' + tmp + ' value="' + element.id + '" />\
                                            <label class="custom-control-label">' + element.name + ' &nbsp;<span class="text-danger">' + '{{ Helper::getLocaleCurrency()->symbol }}' + element.converted_val + '</span></label>\
                                        </div>\
                                    </div>';
                                });
                                $('.div-shipping-methods').html(txt1);
                                $('.total-price').find('span').html(response.total);
                            }

                        } else {
                            toastr['warning'](JSON_MESSAGE.response.something_wrong);
                        }
                    },
                    error: function(response) {
                        toastr['error'](JSON_MESSAGE.response.unknown_error);
                    }
                });
            });

            $('select[name="shipping_country"]').on('change', function(){

                $.ajax({
                    type: "POST",
                    url: "{{ route('cart.getStates', app()->getLocale()) }}",
                    data: {
                        country_id: $(this).val()
                    },
                    headers: {
                        'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')
                    },
                    success: function (response) {
                        if(response.status == 'error') {
                            toastr['error'](response.message);
                        }
                        else if(response.status == 'success'){
                            let txt = ''
                            response.states.forEach(element => {
                                txt += '<option value="' + element.id + '">' + element.name + '</option>';
                            });
                            $('select[name="shipping_state"]').html(txt);

                            let txt1 = '';
                            if(response.is_free_shipping > 0) {
                                txt1 = '<div class="form-group form-group-custom-control">\
                                    <div class="custom-control custom-radio d-flex">\
                                        <input type="radio" class="custom-control-input" form="checkout-form" name="shipping_method" checked value="0" />\
                                        <label class="custom-control-label">FREE &nbsp;<span class="text-danger">' + '{{ Helper::getLocaleCurrency()->symbol }}' + '0.00</span></label>\
                                    </div>\
                                </div>';
                            }

                            response.shipping_methods.forEach((element, index) => {
                                let tmp = '';
                                if(index == 0 && response.is_free_shipping == 0) tmp = 'checked';
                                txt1 += '<div class="form-group form-group-custom-control">\
                                    <div class="custom-control custom-radio d-flex">\
                                        <input type="radio" class="custom-control-input" form="checkout-form" name="shipping_method"' + tmp + ' value="' + element.id + '" />\
                                        <label class="custom-control-label">' + element.name + ' &nbsp;<span class="text-danger">' + '{{ Helper::getLocaleCurrency()->symbol }}' + element.converted_val + '</span></label>\
                                    </div>\
                                </div>';
                            });
                            $('.div-shipping-methods').html(txt1);
                            $('.total-price').find('span').html(response.total);

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
