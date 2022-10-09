@extends('frontend.layout.app')

@section('content')

<div class="page-header" style="background: no-repeat 60%/cover url({{ asset('assets/images/elements/page-header-auth.jpg') }});">
    <div class="container d-flex flex-column align-items-center">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home', app()->getLocale()) }}">{{ __('title.home') }}</a></li>
                    <li class="breadcrumb-item active text-dark" aria-current="page">
                        {{ __('title.reset_password') }}
                    </li>
                </ol>
            </div>
        </nav>
        <h1 class="text-uppercase">{{ __('title.reset_password') }}</h1>
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

                    <form action="{{ route('reset-password', app()->getLocale()) }}" method="POST" id="form_reset_password">
                        @csrf
                        <input type="hidden" name="token" value="{{ Request::segment(4) }}">
                        <h3 class="text-center">{{ __('title.reset_password') }}</h3>
                        <div class="text-center py-5">
                            <span class="text-center">{{ __('message.reset_password_description') }}</span>
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
                                <label for="password">{{ __('label.password') }}<span class="required">*</span></label>
                                <input type="password" class="form-input form-wide form-control" id="password" name="password" value="{{ old('password') }}" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="confirm-password">{{ __('label.confirm_password') }}<span class="required">*</span></label>
                                <input type="password" class="form-input form-wide form-control" id="confirm-password" name="confirm_password" value="{{ old('confirm_password') }}" />
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

    $("#form_reset_password").validate({
        rules: {
            password: {
                required: true,
                minlength: 6
            },
            confirm_password: {
                required: true,
                equalTo: '#password'
            },
        },
        messages: {
            password: {
                required: "{{ __('message.validation.password_required') }}",
                minlength: "{{ __('message.validation.password_length_error') }}",
            },
            confirm_password: {
                required: "{{ __('message.validation.confirm_password_required') }}",
                equalTo: "{{ __('message.validation.confirm_password_error') }}",
            },
        },
    });

</script>

@endpush

