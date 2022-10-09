@extends('frontend.layout.app')

@section('content')

<!-- 404 page -->
<section class="page-404" style="background-image: url({{ asset('assets/images/bg-404.jpg') }});">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="text-white font-weight-bold mb-2">{{ __('message.404.error_title') }}</h1>
                <h4 class="text-white mb-4">{{ __('message.404.error_msg') }}</h4>
                <a href="{{ route('home', app()->getLocale()) }}" class="btn btn-primary"> <i class="fas fa-angle-double-left"></i> {{ __('title.buttons.back_to_home') }}</a>
            </div>
        </div>
    </div>
</section>
<!-- /404 page -->

@endsection
