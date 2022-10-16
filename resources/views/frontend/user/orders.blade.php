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
                <li>{{ $title }}</li>
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
                    <div class="tab-pane active mb-4" id="account-orders">
                        <div class="icon-box icon-box-side icon-box-light">
                            <span class="icon-box-icon icon-orders">
                                <i class="w-icon-orders"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
                            </div>
                        </div>

                        <table class="shop-table account-orders-table mb-6">
                            <thead>
                                <tr>
                                    <th class="order-id text-start">Order</th>
                                    <th class="order-date">Date</th>
                                    <th class="order-status">Status</th>
                                    <th class="order-total">Total</th>
                                    <th class="order-actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $list)
                                <tr>
                                    <td class="order-id">#{{ Helper::genID($list->id) }}</td>
                                    <td class="order-date">{{ date_format($list->created_at, "d M Y, g:i A") }}</td>
                                    <td class="order-status">{{ $list->status }}</td>
                                    <td class="order-total">
                                        <span class="order-price">${{ number_format($list->total, 2) }}</span>
                                    </td>
                                    <td class="order-action">
                                        <a href="{{ route('account.order-detail', $list->id) }}" class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="5">You have not any orders.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <a href="{{ route('buy') }}" class="btn btn-dark btn-rounded btn-icon-right">Go Shop<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->
</main>

@endsection
