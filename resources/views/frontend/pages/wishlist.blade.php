@extends('frontend.layout.app')

@section('content')

<div class="page-header" style="background: no-repeat 60%/cover url({{ asset('assets/images/banner-top.jpg') }});">
    <div class="container d-flex flex-column align-items-center">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home', app()->getLocale())}}">{{ __('title.home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('title.wishlist') }}
                    </li>
                </ol>
            </div>
        </nav>
        <h1>{{ __('title.wishlist') }}</h1>
    </div>
</div>

<div class="container">
    <div class="wishlist-title">
        <h2 class="p-2">{{ __('label.my_wishlist') }}</h2>
    </div>
    <div class="wishlist-table-container">
        <table class="table table-wishlist mb-0">
            <thead>
                <tr>
                    <th class="thumbnail-col"></th>
                    <th class="product-col">{{ __('label.product') }}</th>
                    <th class="price-col">{{ __('label.price') }}</th>
                    <th class="status-col">{{ __('label.stock_status') }}</th>
                    <th class="action-col">{{ __('label.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($content as $list)
                <tr class="product-row">
                    <td>
                        <figure class="product-image-container">
                            <a href="{{ route('product-detail', [app()->getLocale(), $list->product->slug]) }}" class="product-image">
                                <img src="{{ asset('products/'.$list->product->photo) }}" alt="{{ $list->product->title }}">
                            </a>
                            <a href="#" class="btn-remove icon-cancel btn-remove-wishlist" data-id="{{ $list->id }}" title="{{ __('title.buttons.remove_product') }}"></a>
                        </figure>
                    </td>
                    <td>
                        <h5 class="product-title font-weight-bold">
                            <a href="{{ route('product-detail', [app()->getLocale(), $list->product->slug]) }}">{{ $list->product->title }}</a>
                        </h5>
                    </td>
                    <td class="price-box">CHF {{ number_format(($list->product->price - $list->product->price * $list->product->discount/100), 2) }}</td>
                    <td>
                        @if($list->product->stock>0)
                        <span class="stock-status text-success">{{ __('label.in_stock') }}</span>
                        @else
                        <span class="stock-status text-danger">{{ __('label.out_of_stock') }}</span>
                        @endif
                    </td>
                    <td class="action">
                        <a href="{{ route('getQuickView', [app()->getLocale(), $list->product->id]) }}" class="btn btn-quickview mt-1 mt-md-0" title="{{ __('title.buttons.quick_view') }}">{{ __('title.buttons.quick_view') }}</a>
                        <button class="btn btn-dark btn-add-cart product-type-simple btn-shop" data-id="{{ $list->product->id }}" {{ $list->product->stock>0?'':'disabled' }} >{{ __('title.buttons.add_to_cart') }}</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center pt-5" colspan="5">
                        <span class="font-weight-semibold py-3">{{ __('message.wishlist_no_product') }}</span><br>
                        <a class="btn btn-primary btn-icon-right btn-md mt-3" href="{{ route('products', app()->getLocale()) }}">{{ __('title.buttons.continue_shopping') }}<i class="fa fa-arrow-right"></i></a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

