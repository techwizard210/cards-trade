@extends('frontend.layout.app')

@section('content')

<main class="main my-account">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">My Account</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('my-account') }}">My account</a></li>
                <li>Order #{{ Helper::genID($content->id) }}</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content pt-2">
        <div class="container">
            <div class="tab-vertical row gutter-lg">

                @include('frontend.user.sidebar')

                <div class="tab-content mb-6">
                    <div class="tab-pane active order">
                        <p class="mb-7"><strong>Order #{{ Helper::genID($content->id) }}</strong> was placed on {{ date_format($content->created_at, "M d, Y") }} and is currently On {{ $content->status }}.</p>
                        <div class="order-details-wrapper mb-5">
                            <h4 class="title text-uppercase ls-25 mb-5">Order Details</h4>
                            <table class="order-table">
                                <thead>
                                    <tr>
                                        <th class="text-dark">Product</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($content->products as $list)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <div class="d-flex">
                                                <a href="{{ route('product.detail', $list->product->merchant->id) }}">
                                                    <figure>
                                                        @if(file_exists(public_path('storage/cards/'.$list->product->merchant->image)) && !empty($list->product->merchant->image))
                                                        <img src="{{ asset('storage/cards/'.$list->product->merchant->image) }}" alt="{{ $list->product->merchant->name }}" width="64" />
                                                        @else
                                                        <img src="{{ asset('user-assets/images/default-card.png') }}" width="64" alt="{{ $list->product->merchant->name }}" />
                                                        @endif
                                                    </figure>
                                                    <div class="pl-5">
                                                        <a href="{{ route('product.detail', $list->product->merchant->id) }}"><strong>{{ $list->product->merchant->name }}</strong></a>&nbsp;<strong>x {{ $list->product->quantity }}</strong><br>
                                                            Value : ${{ number_format($list->product->value, 2) }}
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td>${{ number_format(Helper::getProductPrice($list->product->id), 2) }}</td>
                                    </tr>
                                    @empty

                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Subtotal:</th>
                                        <td>${{ number_format($content->subtotal, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Payment method:</th>
                                        <td>
                                            @switch($content->payment_method)
                                                @case('crypto') Bitcoin
                                                    @break
                                                @case('paypal') Paypal
                                                    @break
                                                @case('bank') Direct bank transfor
                                                    @break
                                                @default Cash on Delivery
                                            @endswitch
                                        </td>
                                    </tr>
                                    <tr class="total">
                                        <th class="border-no">Total:</th>
                                        <td class="border-no">${{ number_format($content->total, 2) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- End of Order Details -->

                        @if(!empty($content->comment))
                        <div class="sub-orders mb-10">
                            <h4 class="title mb-5 font-weight-bold ls-25">Comment</h4>
                            <div class="alert alert-icon alert-inline mb-5">
                                <i class="w-icon-exclamation-triangle"></i>
                                <strong>Note: &nbsp;</strong>{{ $content->comment }}
                            </div>
                        </div>
                        @endif

                        <div id="billing-account-addresses">
                            <div class="row">
                                <div class="col-sm-6 mb-8">
                                    <div class="ecommerce-address billing-address">
                                        <h4 class="title title-underline ls-25 font-weight-bold">Billing Address</h4>
                                        <address class="mb-4">
                                            <table class="address-table">
                                                <tbody>
                                                    <tr>
                                                        <td><strong>{{ $content->b_first_name }} {{ $content->b_last_name }}</strong>
                                                        {{ !empty($content->b_company_name)?'('.$content->b_company_name.')':'' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ !empty($content->b_address2)?$content->b_address2.',':'' }} {{ $content->b_address1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ $content->b_city }}, {{ Helper::getStateNameById($content->b_state) }} {{ $content->b_zip }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ Helper::getCountryNameById($content->b_country) }}</td>
                                                    </tr>
                                                    <tr class="email">
                                                        <td><strong>Email:</strong> {{ $content->b_email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Phone:</strong> {{ $content->b_phone }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-8">
                                    <div class="ecommerce-address shipping-address">
                                        <h4 class="title title-underline ls-25 font-weight-bold">Shipping Address</h4>
                                        <address class="mb-4">
                                            <table class="address-table">
                                                <tbody>
                                                    <tr>
                                                        <td><strong>{{ $content->s_first_name }} {{ $content->s_last_name }}</strong>
                                                        {{ !empty($content->s_company_name)?'('.$content->s_company_name.')':'' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ !empty($content->s_address2)?$content->s_address2.',':'' }} {{ $content->s_address1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ $content->s_city }}, {{ Helper::getStateNameById($content->s_state) }} {{ $content->s_zip }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ Helper::getCountryNameById($content->s_country) }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Account Address -->

                        <a href="{{ route('account.orders')}}" class="btn btn-dark btn-rounded btn-icon-left btn-back mt-6 mb-6"><i class="w-icon-long-arrow-left"></i>Back To List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->
</main>

@endsection
