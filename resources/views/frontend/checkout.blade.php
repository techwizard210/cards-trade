@extends('frontend.layout.app')

@section('content')

<main class="main checkout">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li class="passed"><a href="{{ route('cart') }}">Shopping Cart</a></li>
                <li class="active">Checkout</li>
                <li>Order Complete</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->


    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            {{-- <div class="coupon-toggle">
                Have a coupon? <a href="#"
                    class="show-coupon font-weight-bold text-uppercase text-dark">Enter your
                    code</a>
            </div>
            <div class="coupon-content mb-4">
                <p>If you have a coupon code, please apply it below.</p>
                <div class="input-wrapper-inline">
                    <input type="text" name="coupon_code" class="form-control form-control-md mr-1 mb-2" placeholder="Coupon code" id="coupon_code">
                    <button type="submit" class="btn button btn-rounded btn-coupon mb-2" name="apply_coupon" value="Apply coupon">Apply Coupon</button>
                </div>
            </div> --}}
            <form class="form checkout-form" id="checkout-form" action="{{ route('saveOrder') }}" method="post">
                @csrf
                <div class="row mb-9">
                    <div class="col-lg-7 pr-lg-4 mb-4">
                        <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                            Billing Details
                        </h3>
                        <div class="row gutter-sm">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>First name *</label>
                                    <input type="text" class="form-control form-control-md" name="firstname" value="{{ $user->first_name }}" />
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Last name *</label>
                                    <input type="text" class="form-control form-control-md" name="lastname" value="{{ $user->last_name }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Company name (optional)</label>
                            <input type="text" class="form-control form-control-md" name="company_name">
                        </div>
                        <div class="form-group">
                            <label>Country / Region *</label>
                            <div class="select-box">
                                <select name="country" class="form-control form-control-md">
                                    <option value="233">United States</option>
                                    <option value="232">United Kingdom</option>
                                    <option value="39">Canada</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Street address *</label>
                            <input type="text" placeholder="House number and street name"
                                class="form-control form-control-md mb-2" name="street_address_1"  >
                            <input type="text" placeholder="Apartment, suite, unit, etc. (optional)"
                                class="form-control form-control-md" name="street_address_2"  >
                        </div>
                        <div class="row gutter-sm">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Town / City *</label>
                                    <input type="text" class="form-control form-control-md" name="town"  >
                                </div>
                                <div class="form-group">
                                    <label>ZIP *</label>
                                    <input type="text" class="form-control form-control-md" name="zip" value="{{ $user->post_code }}"  >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State *</label>
                                    <div class="select-box">
                                        <select name="state" class="form-control form-control-md">
                                            @foreach($states as $list)
                                            <option value="{{ $list->id }}">{{ $list->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Phone *</label>
                                    <input type="text" class="form-control form-control-md" name="phone" value="{{ $user->phone }}"  >
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-7">
                            <label>Email address *</label>
                            <input type="email" class="form-control form-control-md" name="email" value="{{ $user->email }}"  >
                        </div>
                        <div class="form-group checkbox-toggle pb-2">
                            <input type="checkbox" class="custom-checkbox" id="shipping-toggle" name="shipping_toggle" value="1">
                            <label for="shipping-toggle">Ship to a different address?</label>
                        </div>
                        <div class="checkbox-content">
                            <div class="row gutter-sm">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>First name *</label>
                                        <input type="text" class="form-control form-control-md" name="s_firstname"
                                        >
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Last name *</label>
                                        <input type="text" class="form-control form-control-md" name="s_lastname"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Company name (optional)</label>
                                <input type="text" class="form-control form-control-md" name="s_company_name">
                            </div>
                            <div class="form-group">
                                <label>Country / Region *</label>
                                <div class="select-box">
                                    <select name="s_country" class="form-control form-control-md">
                                        <option value="233">United States</option>
                                        <option value="232">United Kingdom</option>
                                        <option value="39">Canada</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Street address *</label>
                                <input type="text" placeholder="House number and street name"
                                    class="form-control form-control-md mb-2" name="s_street_address_1"  >
                                <input type="text" placeholder="Apartment, suite, unit, etc. (optional)"
                                    class="form-control form-control-md" name="s_street_address_2"  >
                            </div>
                            <div class="row gutter-sm">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Town / City *</label>
                                        <input type="text" class="form-control form-control-md" name="s_town"  >
                                    </div>
                                    <div class="form-group">
                                        <label>State *</label>
                                        <div class="select-box">
                                            <select name="s_state" class="form-control form-control-md">
                                                @foreach($states as $list)
                                                <option value="{{ $list->id }}">{{ $list->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ZIP / Postcode *</label>
                                        <input type="text" class="form-control form-control-md" name="s_zip"  >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="order-notes">Order notes (optional)</label>
                            <textarea class="form-control mb-0" id="order-notes" name="order_notes" cols="30" rows="4"
                                placeholder="Notes about your order, e.g special notes for delivery"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                        <div class="order-summary-wrapper sticky-sidebar">
                            <h3 class="title text-uppercase ls-10">Your Order</h3>
                            <div class="order-summary">
                                <table class="order-table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">
                                                <b>Product</b>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($content as $list)
                                        <tr class="bb-no">
                                            <td class="product-name">{{ $list->product->merchant->name }} <i
                                                    class="fas fa-times"></i> <span
                                                    class="product-quantity">{{ $list->product->quantity }}</span></td>
                                            <td class="product-total">${{ number_format($list->product->value * (100- $list->product->discount) / 100, 2 )}}</td>
                                        </tr>

                                        @empty

                                        @endforelse

                                        <tr class="cart-subtotal bb-no">
                                            <td>
                                                <b>Subtotal</b>
                                            </td>
                                            <td>
                                                <b>${{ number_format($subtotal, 2)}}</b>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        {{-- <tr class="shipping-methods">
                                            <td colspan="2" class="text-left">
                                                <h4 class="title title-simple bb-no mb-1 pb-0 pt-3">Shipping
                                                </h4>
                                                <ul id="shipping-method" class="mb-4">
                                                    <li>
                                                        <div class="custom-radio">
                                                            <input type="radio" id="free-shipping"
                                                                class="custom-control-input" name="shipping">
                                                            <label for="free-shipping"
                                                                class="custom-control-label color-dark">Free
                                                                Shipping</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-radio">
                                                            <input type="radio" id="local-pickup"
                                                                class="custom-control-input" name="shipping">
                                                            <label for="local-pickup"
                                                                class="custom-control-label color-dark">Local
                                                                Pickup</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-radio">
                                                            <input type="radio" id="flat-rate"
                                                                class="custom-control-input" name="shipping">
                                                            <label for="flat-rate"
                                                                class="custom-control-label color-dark">Flat
                                                                rate: $5.00</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr> --}}
                                        <tr class="order-total">
                                            <th>
                                                <b>Total</b>
                                            </th>
                                            <td>
                                                <b>${{ number_format($total, 2)}}</b>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

                                <div class="payment-methods" id="payment_method">
                                    <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Payment Methods</h4>
                                    <div class="accordion payment-accordion">
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="#coin" class="collapse">Bitcoin</a>
                                            </div>
                                            <div id="coin" class="card-body expanded">
                                                {{-- <p class="mb-0">
                                                    Pay with Bitcoin on GoURL.io
                                                </p> --}}
                                            </div>
                                        </div>
                                        {{-- <div class="card">
                                            <div class="card-header">
                                                <a href="#cash-on-delivery" class="collapse">Direct Bank Transfor</a>
                                            </div>
                                            <div id="cash-on-delivery" class="card-body expanded">
                                                <p class="mb-0">
                                                    Make your payment directly into our bank account.
                                                    Please use your Order ID as the payment reference.
                                                    Your order will not be shipped until the funds have cleared in our account.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="#payment" class="expand">Check Payments</a>
                                            </div>
                                            <div id="payment" class="card-body collapsed">
                                                <p class="mb-0">
                                                    Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="#delivery" class="expand">Cash on delivery</a>
                                            </div>
                                            <div id="delivery" class="card-body collapsed">
                                                <p class="mb-0">
                                                    Pay with cash upon delivery.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="card p-relative">
                                            <div class="card-header">
                                                <a href="#paypal" class="expand">Paypal</a>
                                            </div>
                                            <a href="https://www.paypal.com/us/webapps/mpp/paypal-popup" class="text-primary paypal-que"
                                                onclick="javascript:window.open('https://www.paypal.com/us/webapps/mpp/paypal-popup','WIPaypal',
                                                'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700');
                                                return false;">What is PayPal?
                                            </a>
                                            <div id="paypal" class="card-body collapsed">
                                                <p class="mb-0">
                                                    Pay via PayPal, you can pay with your credit cart if you
                                                    don't have a PayPal account.
                                                </p>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>

                                <div class="form-group place-order pt-6">
                                    <button type="submit" class="btn btn-dark btn-block btn-rounded">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End of PageContent -->
</main>

@endsection

@push('page-script')

<script type="text/javascript">

$( document ).ready(function() {

    $("#checkout-form").validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            firstname: {
                required: true
            },
            lastname: {
                required: true
            },
            street_address_1: {
                required: true
            },
            town: {
                required: true
            },
            zip: {
                required: true
            },
            phone: {
                required: true
            },
            s_firstname: {
                required: true
            },
            s_lastname: {
                required: true
            },
            s_street_address_1: {
                required: true
            },
            s_town: {
                required: true
            },
            s_zip: {
                required: true
            },
        },
        messages: {
            email: {
                required: "This field is required",
                email: "Invalid Email address",
            },
            firstname: {
                required: "This field is required",
            },
            lastname: {
                required: "This field is required",
            },
            street_address_1: {
                required: "This field is required",
            },
            town: {
                required: "This field is required",
            },
            zip: {
                required: "This field is required",
            },
            phone: {
                required: "This field is required",
            },
            s_firstname: {
                required: "This field is required",
            },
            s_lastname: {
                required: "This field is required",
            },
            s_street_address_1: {
                required: "This field is required",
            },
            s_town: {
                required: "This field is required",
            },
            s_zip: {
                required: "This field is required",
            },
        },
    });

    $('select[name="country"]').on('change', function(){
        $.ajax({
            type: "POST",
            url: "{{ route('util.getStateData') }}",
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
                } else {
                    toastr['warning']('Sorry, something went wrong...');
                }
            },
            error: function(response) {
                toastr['error']('Failed, DB connection error');
            }
        });
    });

    $('select[name="s_country"]').on('change', function(){
        $.ajax({
            type: "POST",
            url: "{{ route('util.getStateData') }}",
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
                    $('select[name="s_state"]').html(txt);
                } else {
                    toastr['warning']('Sorry, something went wrong...');
                }
            },
            error: function(response) {
                toastr['error']('Failed, DB connection error');
            }
        });
    });

});

</script>

@endpush
