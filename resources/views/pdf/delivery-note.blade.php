@extends('pdf.layout')

@section('content')

<div style="width: 100%">
    <div class="row" style="width: 100%; display: flex; margin-bottom: 100px;">
        <div style="width: 40%; padding: 10px;">
            <a href="https://elegancelinsen.ch" target="_blank">
                <img src="{{ asset('assets/images/logo-black.png') }}" width="100%" alt="{{ Helper::getCommonSetting('company_logo_name') }}" />
            </a>
        </div>
        <div style="width: 17%;"></div>
        <div style="width: 42%; float:right;">
            <div class="">
                <span style="font-size: 16px;">
                    <span style="font-weight: 600;">{{ $content->bank_user }}</span>
                    <br><span>{{ $content->bank_street }}</span>
                    <br><span>{{ $content->bank_zip }} {{ $content->bank_city }}</span>
                    <br><span><strong>Tel.:</strong> {{ $content->bank_phone }}</span>
                    <br><span>{{ $content->bank_email }}</span>
                    <br><span><strong>MWST/UID-{{ __('label.num', array(), $lang) }}</strong> {{ $content->bank_tax }}</span>
                </span>
            </div>
        </div>
    </div>

    <div class="row" style="width: 100%; display: flex; margin-bottom: 20px;">
        <div style="width: 50%; font-size: 16px;">
            <a href="https://eyeart.ch" style="font-weight: 600; color:#224cbe; font-size: 14px;">
                {{ $content->bank_user }}, {{ $content->bank_street }}, {{ $content->bank_zip }} {{ $content->bank_city }}
            </a>
            <br><span style="font-weight: 600;">{{ $order->first_name }} {{ $order->last_name }}</span>
            <br><span>{{ !empty($order->address2)?$order->address2.',':'' }} {{ $order->address1 }}</span>
            <br><span>{{ $order->post_code }} {{ $order->city }}, {{ Helper::getStateNameById($order->state) }}</span>
            <br><span>{{ Helper::getCountryNameById($order->country) }}</span>
        </div>
        <div style="width: 7%;"></div>
        <div style="width: 42%; float:right; padding-left: 20px;">
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td width="50%">{{ __('label.delivery_note', array(), $lang) }}-{{ __('label.num', array(), $lang) }}</td>
                        <td width="50%">{{ Helper::genID($content->id) }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('label.customer', array(), $lang) }}-{{ __('label.num', array(), $lang) }}</td>
                        <td>{{ Helper::getCustomerInfo($order->user_id)->customer_id }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('label.delivery', array(), $lang) }} {{ __('label.date', array(), $lang) }}</td>
                        <td>{{ date('d.m.Y', strtotime($content->created_at)) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row" style="width: 100%; margin-bottom: 40px;">
        <h2>{{ __('label.delivery_note', array(), $lang) }} #{{ Helper::genID($content->id) }}</h2>
    </div>

    <div class="row" style="width: 100%; margin-bottom: 40px;">
        <table class="table table-admin-invoice-detail" >
            <thead>
                <tr>
                    <th>{{ __('label.num', array(), $lang) }}</th>
                    <th>{{ __('label.product', array(), $lang) }}</th>
                    <th>{{ __('label.quantity', array(), $lang) }}</th>
                    <th>{{ __('label.price', array(), $lang) }}</th>
                    <th>{{ __('label.total', array(), $lang) }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $list)
                <tr class="font-size-h4 text-dark border-bottom-0">
                    <td class="pl-0 pt-7">{{ $index + 1 }}</td>
                    <td class="pt-7">
                        <span class="font-weight-boldest">
                            <span>
                                {{ $list->product->title }}
                            </span>
                        </span>
                        <span class="text-danger" style="font-size: 12px;"><br>UPC: {{ $list->product->UPC }}</span>
                        @if($list->product->template == 'lens')
                        <br><span><em>
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
                        <br><span><em>
                            @if(!empty($list->diopter)) Diopter: {{ $list->diopter }} @endif
                            @if(!empty($list->color)), Color: {{ $list->color }} @endif
                        </em></span>
                        @endif
                    </td>
                    <td class="pt-7">{{ $list->quantity }}</td>
                    <td class="text-right pt-7">{{ $list->unit_price }} / Stk.</td>
                    <td class="pr-0 pt-7 text-right">
                        {{ number_format($list->amount, 2) }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row" style="width: 100%; display: flex; margin-bottom: 40px;">
        <div style="width: 50%; font-size: 16px;">
        </div>
        <div style="width: 7%;"></div>
        <div style="width: 42%; float:right; padding-left: 20px;">
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td width="60%" style="border-bottom: 1px solid #808080;">{{ __('label.subtotal', array(), $lang) }}</td>
                        <td width="40%" style="border-bottom: 1px solid #808080;">{{ Helper::getCurSymbol($order->currency) }}{{ number_format($order->sub_total, 2) }}</td>
                    </tr>
                    <tr class="text-dark">
                        <td>COUPON</td>
                        <td class="text-right">{{ Helper::getCurSymbol($order->currency) }}{{ number_format($order->coupon, 2) }}</td>
                    </tr>
                    <tr class="text-dark">
                        <td>{{ __('label.shipping_and_packaging', array(), $lang) }}</td>
                        <td class="text-right">{{ Helper::getCurSymbol($order->currency) }}{{ number_format($order->shipping_fee, 2) }}</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 2px solid #808080;"><strong>{{ __('label.total', array(), $lang) }}</strong></td>
                        <td style="border-bottom: 2px solid #808080;"><strong>{{ Helper::getCurSymbol($order->currency) }}{{ number_format($order->total_amount, 2) }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
