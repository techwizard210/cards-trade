@extends('backend.layout.app')

@push('page-title')

    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">{{ __('label.delivery_note') }} #{{ Helper::genID($data->id) }}</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">{{ __('title.home') }}</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('admin.delivery.index') }}" class="text-muted text-hover-primary">{{ __('title.delivery_notes') }}</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-dark">{{ __('label.delivery_note') }} #{{ Helper::genID($data->id) }}</li>
    </ul>

@endpush

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card">
                <div class="card-body p-lg-20">
                    <div class="d-flex flex-column flex-xl-row">
                        <!--begin::Content-->
                        <div class="flex-lg-row-fluid me-xl-18 mb-10 mb-xl-0">
                            <div class="mt-n1">
                                <div class="d-flex flex-stack pb-10">
                                    <a href="#">
                                        <img alt="Elegance" src="{{ asset('assets/images/logo-black.png') }}" width="240" />
                                    </a>
                                    <div class="d-flex flex-column align-items-md-end px-0">
                                        <span class="d-flex font-size-h3 flex-column text-dark">
                                            <span class="fw-boldest">{{ $data->bank_user }}</span>
                                            <span>{{ $data->bank_street }}</span>
                                            <span>{{ $data->bank_zip }} {{ $data->bank_city }}</span>
                                            <span><strong>Tel.:</strong> {{ $data->bank_phone }}</span>
                                            <span>{{ $data->bank_email }}</span>
                                            <span><strong>MWST/UID-{{ __('label.num') }}</strong> {{ $data->bank_tax }}</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="m-0">
                                    <div class="fw-bolder fs-1 text-gray-800 mb-8">{{ __('label.delivery_note') }} #{{ Helper::genID($data->id) }}</div>
                                    <div class="row g-5 mb-11">
                                        <div class="col-sm-6">
                                            <div class="fw-bold fs-7 text-gray-600 mb-1">{{ __('label.delivery') }} {{ __('label.date') }}:</div>
                                            <div class="fw-bolder fs-6 text-gray-800">{{ date_format($data->created_at, "d M Y") }}</div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="fw-bold fs-7 text-gray-600 mb-1">{{ __('label.order') }} {{ __('label.date') }}:</div>
                                            <div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center flex-wrap">
                                                <span class="pe-2">{{ date_format($data->order->created_at, "d M Y") }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-5 mb-12">
                                        <div class="col-sm-6">
                                            <div class="fw-bold fs-7 text-gray-600 mb-1">{{ __('label.issue_for') }}:</div>
                                            <div class="fw-bolder fs-6 text-gray-800">{{ $data->order->first_name }} {{ $data->order->last_name }}</div>
                                            <div class="fw-bold fs-7 text-gray-600">
                                                {{ !empty($data->order->address2)?$data->order->address2.',':'' }} {{ $data->order->address1 }}
                                                <br />{{ $data->order->post_code }} {{ $data->order->city }}, {{ Helper::getStateNameById($data->order->state) }}<br>
                                                {{ Helper::getCountryNameById($data->order->country) }}
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="fw-bold fs-7 text-gray-600 mb-1">{{ __('label.issued_by') }}:</div>
                                            <div class="fw-bolder fs-6 text-gray-800">{{ $data->bank_user }}</div>
                                            <div class="fw-bold fs-7 text-gray-600">{{ $data->bank_street }}
                                                <br />{{ $data->bank_zip }} {{ $data->bank_city }}
                                                <br>{{ Helper::getCountryNameById($data->bank_country) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="table-responsive border-bottom mb-9">
                                            <table class="table mb-3">
                                                <thead>
                                                    <tr class="border-bottom fs-6 fw-bolder text-muted">
                                                        <th class="min-w-50px pb-2">{{ __('label.num') }}</th>
                                                        <th class="min-w-175px pb-2">{{ __('label.product') }}</th>
                                                        <th class="min-w-70px text-end pb-2">{{ __('label.quantity') }}</th>
                                                        <th class="min-w-80px text-end pb-2">{{ __('label.price') }} / {{ __('label.unit') }}</th>
                                                        <th class="min-w-100px text-end pb-2">{{ __('label.total') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($products as $index => $list)
                                                    <tr class="fw-bolder text-gray-700 fs-5 text-end">
                                                        <td class="pt-6 text-start">
                                                            {{ $index + 1 }}
                                                        </td>
                                                        <td class="text-start pt-6">
                                                            {{ $list->product->title }}<br>
                                                            <span class="fw-bold text-danger" style="font-size: 12px;">UPC: {{ $list->product->UPC }}</span>
                                                            @if($list->product->template == 'lens')
                                                            <br><span class="fw-normal text-gray-600 fs-7"><em>
                                                                @if(!empty($list->SPH_r)) SPH: {{ $list->SPH_r }}@if($list->eye_diff)/{{ $list->SPH_l}}@endif @endif
                                                                @if(!empty($list->CYL_r)), CYL: {{ $list->CYL_r }}@if($list->eye_diff)/{{ $list->CYL_l}}@endif @endif
                                                                @if(!empty($list->DIA_r)), DIA: {{ $list->DIA_r }}@if($list->eye_diff)/{{ $list->DIA_l}}@endif @endif
                                                                @if(!empty($list->RAD_r)), RAD: {{ $list->RAD_r }}@if($list->eye_diff)/{{ $list->RAD_l}}@endif @endif
                                                                @if(!empty($list->ADD_r)), ADD: {{ $list->ADD_r }}@if($list->eye_diff)/{{ $list->ADD_l}}@endif @endif
                                                                @if(!empty($list->AXIS_r)), AXIS: {{ $list->AXIS_r }}@if($list->eye_diff)/{{ $list->AXIS_l}}@endif @endif
                                                                @if(!empty($list->quantity_r)), Quantity: {{ $list->quantity_r }}@if($list->eye_diff)/{{ $list->quantity_l}}@endif @endif
                                                            </em></span>
                                                            @endif
                                                            @if($list->product->template == 'contact_lens')
                                                            <br><span class="fw-normal text-gray-600 fs-7"><em>
                                                                @if(!empty($list->diopter)) Diopter: {{ $list->diopter }} @endif
                                                                @if(!empty($list->color)), Color: {{ $list->color }} @endif
                                                            </em></span>
                                                            @endif
                                                        </td>
                                                        <td class="pt-6">{{ $list->quantity }}</td>
                                                        <td class="pt-6">{{ $list->unit_price }} / Stk.</td>
                                                        <td class="pt-6 text-dark fw-boldest">{{ number_format($list->amount, 2) }}</td>
                                                    </tr>
                                                    @endforeach
                                                    <tr class="fw-bolder text-gray-700 fs-5 text-end">
                                                        <td class="pt-6 text-start">
                                                            {{ count($products) + 1 }}
                                                        </td>
                                                        <td class="d-flex align-items-center pt-6">
                                                            {{ __('label.shipping_and_packaging') }}
                                                        </td>
                                                        <td class="pt-6">-</td>
                                                        <td class="pt-6">{{ number_format($data->order->shipping_fee, 2) }}</td>
                                                        <td class="pt-6 text-dark fw-boldest">{{ number_format($data->order->shipping_fee, 2) }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <div class="mw-300px">
                                                <div class="d-flex flex-stack mb-3">
                                                    <div class="fw-bold pe-10 text-gray-600 fs-7">{{ __('label.subtotal') }}:</div>
                                                    <div class="text-end fw-bolder fs-6 text-gray-800">{{ Helper::getCurSymbol($data->order->currency) }}{{ number_format($data->order->sub_total, 2) }}</div>
                                                </div>
                                                <div class="d-flex flex-stack mb-3">
                                                    <div class="fw-bold pe-10 text-gray-600 fs-7">COUPON:</div>
                                                    <div class="text-end fw-bolder fs-6 text-gray-800">{{ Helper::getCurSymbol($data->order->currency) }}{{ number_format($data->order->coupon, 2)}}</div>
                                                </div>
                                                <div class="d-flex flex-stack">
                                                    <div class="fw-boldest pe-10 text-gray-600 fs-7 text-uppercase">{{ __('label.total') }}</div>
                                                    <div class="text-end fw-bolder fs-6 text-gray-800">{{ Helper::getCurSymbol($data->order->currency) }}{{ number_format($data->order->total_amount, 2) }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-0">
                            <div class="d-print-none border border-dashed border-gray-300 card-rounded h-lg-100 min-w-md-350px p-9 bg-lighten">
                                <h6 class="mb-8 fw-boldest text-gray-600 text-hover-primary text-uppercase">{{ __('title.order_details') }}</h6>
                                <div class="mb-6">
                                    <div class="fw-bold text-gray-600 fs-7">{{ __('label.order') }}:</div>
                                    <a href="{{ route('admin.order.detail', $data->order->id) }}" class="fw-bolder text-hover-primary text-gray-800 fs-6">{{ __('label.order') }} #{{ Helper::genID($data->order->id) }}</a>
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="mb-6">
                                    <div class="fw-bold text-gray-600 fs-7">{{ __('label.customer') }}:</div>
                                    <a href="{{ route('admin.user.detail', $data->order->user_id) }}" class="fw-bolder text-hover-primary text-gray-800 fs-6">
                                        @if(!empty(Helper::getCustomerInfo($data->order->user_id)->first_name)) {{ Helper::getCustomerInfo($data->order->user_id)->first_name }} {{ Helper::getCustomerInfo($data->order->user_id)->last_name }}
                                        @else {{ Helper::getCustomerInfo($data->order->user_id)->name }}
                                        @endif
                                    <br /><small class="text-danger">{{ Helper::getCustomerInfo($data->order->user_id)->customer_id }}</small></a>
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="mb-15">
                                    <div class="fw-bold text-gray-600 fs-7">{{ __('label.date') }}:</div>
                                    <div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center">{{ date_format($data->order->created_at, "d M Y") }}</div>
                                </div>
                                <!--end::Item-->
                                <!--begin::Title-->
                                <h6 class="mb-8 fw-boldest text-gray-600 text-hover-primary">{{ __('label.delivery_detail')}}</h6>
                                <div class="mb-6">
                                    <div class="fw-bold text-gray-600 fs-7">{{ __('label.date') }}:</div>
                                    <div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center">{{ date_format($data->created_at, "d M Y") }}</div>
                                </div>

                                <!--begin::Item-->
                                <div class="mb-0">
                                    <a href="{{ asset('storage/delivery/'.$data->path) }}" class="btn btn-success text-uppercase mb-1 w-100" download><i class="fa fa-download"></i> {{ __('label.download') }}</a>
                                    {{-- <a class="btn btn-danger text-uppercase w-100"><i class="fa fa-trash"></i> {{ __('title.buttons.delete') }}</a> --}}
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Invoice 2 sidebar-->
                        </div>
                        <!--end::Sidebar-->
                    </div>
                    <!--end::Layout-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Invoice 2 main-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

@endsection
