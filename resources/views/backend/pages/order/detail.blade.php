@extends('backend.layout.app')

@push('page-title')

    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">{{ $content->order_number }}</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">{{ __('title.home') }}</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('admin.order.index') }}" class="text-muted text-hover-primary">{{ __('title.orders') }}</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-dark">{{ $content->order_number }}</li>
    </ul>

@endpush

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">

            <form id="kt_ecommerce_update_brand_form" class="form d-flex flex-column flex-lg-row gap-7 gap-lg-10" data-kt-redirect="{{ route('admin.brand.index') }}">

                @csrf

                <input name="id" id="update-order-id" value="{{ $content->id }}" hidden>
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px">

                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __('label.customer') }}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex flex-center flex-column mb-5">
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    @empty($content->user->photo)
                                    <img src="{{ asset('admin-assets/media/blank-user.png') }}" alt="{{ $content->user->name }}" />
                                    @else
                                    <img src="{{ asset('users/'.$content->user->photo) }}" alt="{{ $content->user->name }}" />
                                    @endempty
                                </div>
                                <a href="{{ route('admin.user.detail', $content->user->id )}}" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1">{{ $content->user->name }}</a>
                                <div class="fs-5 fw-bold text-muted mb-6">
                                    @if($content->user->status == 'active')
                                    <div class="badge badge-light-success d-inline">{{ __('label.active') }}</div>
                                    @else
                                    <div class="badge badge-light-danger d-inline">{{ __('label.inactive') }}</div>
                                    @endif
                                </div>
                            </div>
                            <!--begin::Details toggle-->
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_customer_view_details" role="button" aria-expanded="true" aria-controls="kt_customer_view_details">{{ __('label.details') }}
                                <span class="ms-2 rotate-180">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span></div>
                                <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="" data-bs-original-title="Edit customer details">
                                    <a href="{{ route('admin.user.detail', $content->user->id )}}" class="btn btn-sm btn-light-primary" >{{ __('title.buttons.edit') }}</a>
                                </span>
                            </div>
                            <!--end::Details toggle-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--begin::Details content-->
                            <div id="kt_customer_view_details" class="collapse show" style="">
                                <div class="py-5 fs-6">
                                    <div class="fw-bolder mt-5">{{ __('label.customer') }} ID</div>
                                    <div class="text-gray-600">{{ $content->user->customer_id }}</div>
                                    <div class="fw-bolder mt-5">{{ __('label.email') }}</div>
                                    <div class="text-gray-600">
                                        <a href="#" class="text-gray-600 text-hover-primary">{{ $content->user->email }}</a>
                                    </div>
                                    <div class="fw-bolder mt-5">{{ __('label.billing_address') }}</div>
                                    <div class="text-gray-600">{{ $content->user->address1 }}, {{ $content->user->address2 }}
                                    <br>{{ $content->user->city }} {{ $content->user->post_code }} {{ $content->user->state }}
                                    <br>{{ Helper::getCountryNameById($content->user->country) }}</div>
                                </div>
                            </div>
                            <!--end::Details content-->
                        </div>
                    </div>

                    <!--begin::Status-->
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __('label.status') }}</h2>
                            </div>
                            <div class="card-toolbar">
                                <div class="rounded-circle {{ $content->status == 'active' ? 'bg-success' : 'bg-danger' }} w-15px h-15px" id="kt_ecommerce_edit_order_status"></div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <select class="form-select mb-2" name="status" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="kt_ecommerce_edit_order_status_select">
                                <option value="completed" {{ $content->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="new" {{ $content->status == 'new' ? 'selected' : '' }}>New</option>
                                <option value="process" {{ $content->status == 'process' ? 'selected' : '' }}>Processing</option>
                                <option value="cancelled" {{ $content->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                <option value="refunded" {{ $content->status == 'refunded' ? 'selected' : '' }}>Refunded</option>
                                <option value="delivered" {{ $content->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                            </select>
                            <div class="text-muted fs-7">{{ __('message.admin.status_notice') }}</div>
                        </div>
                    </div>
                    <!--end::Status-->

                </div>
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="card card-custom gutter-b">
                        <div class="card-body p-0">
                            <!-- begin: Invoice-->
                            <!-- begin: Invoice header-->
                            <div class="row justify-content-center pt-20 py-8 px-8 py-md-27 px-md-0">
                                <div class="col-md-10">
                                    <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                                        <h4 class="display-6 fw-boldest mb-10 text-uppercase">{{ __('title.order_details') }}</h4>
                                        <div class="d-flex flex-column align-items-md-end px-0">
                                            <a href="{{ route('home') }}" class="mb-5">
                                                <img src="{{ asset('assets/images/logo-black.png') }}" width="180" alt="{{ Helper::getCommonSetting('company_logo_name') }}">
                                            </a>
                                            <span class="d-flex flex-column align-items-md-end opacity-70">
                                                <span>{{ Helper::getCommonSetting('company_address') }}, {{ Helper::getCommonSetting('company_city') }}</span>
                                                <span>{{ Helper::getCommonSetting('company_post_code') }}, {{ Helper::getCommonSetting('company_country') }}</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="border-bottom w-100"></div>
                                    <div class="d-flex justify-content-between pt-6">
                                        <div class="d-flex flex-column flex-root">
                                            <span class="fw-bolder mb-2">ORDER DATE</span>
                                            <span class="opacity-70">{{ date_format($content->created_at, "M d, Y") }}</span>
                                        </div>
                                        <div class="d-flex flex-column flex-root">
                                            <span class="fw-bolder mb-2">ORDER NO.</span>
                                            <span class="opacity-70">{{ $content->order_number }}</span>
                                        </div>
                                        <div class="d-flex flex-column flex-root">
                                            <span class="fw-bolder mb-2">DELIVERED TO.</span>
                                            <span class="opacity-70">Iris Watson, P.O. Box 283 8562 Fusce RD.
                                            <br>Fredrick Nebraska 20620</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Invoice header-->
                            <!-- begin: Invoice body-->
                            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                                <div class="col-md-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="pl-0 fw-bold text-muted text-uppercase">{{ __('label.product') }}</th>
                                                    <th class="text-right fw-bold text-muted text-uppercase">Qty</th>
                                                    <th class="text-right fw-bold text-muted text-uppercase">Unit Price</th>
                                                    <th class="text-right pr-0 fw-bold text-muted text-uppercase">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @forelse ($order_products as $list)

                                                <tr class="fw-boldest">
                                                    <td class="border-0 pl-0 pt-7 d-flex align-items-center">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40 flex-shrink-0 me-4 bg-light">
                                                        @empty($list->photo)
                                                            <div class="symbol-label" style="background-image:url({{ asset('admin-assets/media/product-default.png') }});"></div>
                                                        @else
                                                            <div class="symbol-label" style="background-image:url({{ asset('products/'.$list->photo) }});"></div>
                                                        @endempty
                                                    </div>
                                                    <!--end::Symbol-->
                                                    {{ $list->title }}</td>
                                                    <td class="text-right pt-7 align-middle">{{ $list->quantity }}</td>
                                                    <td class="text-right pt-7 align-middle">CHF {{ number_format($list->unit_price, 2) }}</td>
                                                    <td class="text-primary pr-0 pt-7 text-right align-middle">CHF {{ number_format($list->unit_price * $list->quantity, 2) }}</td>
                                                </tr>

                                                @empty

                                                @endforelse

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Invoice body-->
                            <!-- begin: Invoice footer-->
                            <div class="row justify-content-center bg-lighten py-8 px-8 py-md-10 px-md-0 mx-0">
                                <div class="col-md-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="font-weight-bold text-muted text-uppercase">PAYMENT TYPE</th>
                                                    <th class="font-weight-bold text-muted text-uppercase">PAYMENT STATUS</th>
                                                    <th class="font-weight-bold text-muted text-uppercase">PAYMENT DATE</th>
                                                    <th class="font-weight-bold text-muted text-uppercase text-right">TOTAL PAID</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="fw-bolder">
                                                    <td>Credit Card</td>
                                                    <td>Success</td>
                                                    <td>Jan 07, 2020</td>
                                                    <td class="text-primary font-size-h3 fw-boldest text-right">CHF {{ number_format($content->total_amount, 2) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Invoice footer-->
                            <!-- begin: Invoice action-->
                            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                                <div class="col-md-10">
                                    <div class="d-flex justify-content-between">
                                        {{-- <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Order Details</button>
                                        <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print Order Details</button>--}}
                                    </div>
                                </div>
                            </div>
                            <!-- end: Invoice action-->
                            <!-- end: Invoice-->
                        </div>
                    </div>
                </div>
                <!--end::Main column-->
            </form>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

@endsection

@push('page-script')
    <script src="{{ asset('admin-assets/js/pages/order/detail.js') }}"></script>
@endpush
