@extends('frontend.layout.app')

@section('content')

<div class="page-header" style="background: no-repeat 60%/cover url({{ asset('assets/images/elements/page-header-auth.jpg') }});">
    <div class="container d-flex flex-column align-items-center">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home', app()->getLocale()) }}">{{ __('title.home') }}</a></li>
                    <li class="breadcrumb-item active text-dark" aria-current="page">
                        {{ __('title.forgot_password') }}
                    </li>
                </ol>
            </div>
        </nav>
        <h1 class="text-uppercase">{{ __('title.forgot_password') }}</h1>
    </div>
</div>

<div class="container login-container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/bg-auth.jpg') }}" />
                </div>
                <div class="col-md-6 pt-5">

                    <form action="{{ route('reset_password_with_token', app()->getLocale()) }}" method="POST" id="form_forgot_password">
                        @csrf
                        <h3 class="text-center">{{ __('title.forgot_password') }}?</h3>
                        <div class="text-center py-5">
                            <span class="text-center">{{ __('message.forgot_password_description') }}</span>
                        </div>
                        @if(session()->has('message'))
                        <div class="alert alert-rounded alert-success alert-dismissible">
                            <span>{{ session()->get('message') }}</span>
                        </div>
                        @endif
                        @if($errors->any())
                        <div class="alert alert-rounded alert-danger alert-dismissible">
                            <span>{{ $errors->first() }}</span>
                        </div>
                        @endif
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="email">{{ __('label.email') }}<span class="required">*</span></label>
                                <input type="email" class="form-input form-wide form-control" id="email" name="email" value="{{ old('email') }}" />
                            </div>
                        </div>

                        <button type="submit" class="btn btn-dark btn-md w-100 mb-1 mt-2">{{ __('title.buttons.submit') }}</button>

                        <div class="text-center">
                            <a href="{{ route('login', app()->getLocale()) }}" class="font-weight-bold">< {{ __('title.buttons.back_to_login') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('page-scripts')

<script type="text/javascript">

    $("#form_forgot_password").validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
        },
        messages: {
            email: {
                required: "{{ __('message.validation.required') }}",
                email: "{{ __('message.validation.invalid_email') }}",
            },
        },
    });

</script>

@endpush

