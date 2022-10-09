@extends('frontend.layout.app')

@section('content')

<section class="page-notify" style="background-image: url({{ asset('assets/images/bg-success.jpg') }});">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="text-gray font-weight-bold mb-2">{{ __('message.home.congrat') }}</h1>
                <h4 class="text-gray mb-4">{{ __('message.home.congrat_msg') }}</h4>
                @auth
                <a href="{{ route('home', app()->getLocale()) }}" class="btn btn-primary"> <i class="fas fa-angle-double-left"></i> {{ __('title.buttons.back_to_home') }}</a>
                @else
                <a href="{{ route('login', app()->getLocale()) }}" class="btn btn-primary"> <i class="fas fa-angle-double-left"></i> {{ __('title.login') }}</a>
                @endauth

            </div>
        </div>
    </div>
</section>

@endsection
