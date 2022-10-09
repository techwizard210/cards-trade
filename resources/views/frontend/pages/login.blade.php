@extends('frontend.layout.app')

@section('content')

<div class="page-header" style="background: no-repeat 60%/cover url({{ asset('assets/images/elements/page-header-auth.jpg') }});">
    <div class="container d-flex flex-column align-items-center">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home', app()->getLocale()) }}">{{ __('title.home') }}</a></li>
                    <li class="breadcrumb-item active text-dark" aria-current="page">
                        {{ __('title.login') }}
                    </li>
                </ol>
            </div>
        </nav>
        <h1 class="text-uppercase">{{ __('title.login') }}</h1>
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
                    @if(session()->has('message'))
                    <div class="alert alert-rounded alert-success alert-dismissible">
                        <span>{{ session()->get('message') }}</span>
                    </div>
                    @endif
                    @if($errors->any())
                    <div class="alert alert-rounded alert-danger alert-dismissible">
                        <span>{{$errors->first()}}</span>
                    </div>
                    @endif
                    <form action="{{ route('login.submit', app()->getLocale()) }}" method="POST" id="form_login">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="login-email">{{ __('label.email') }}<span class="required">*</span></label>
                                <input type="email" class="form-input form-wide" id="email" name="email" value="{{ old('email') }}" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="login-password">{{ __('label.password') }}<span class="required">*</span></label>
                                <input type="password" class="form-input form-wide" id="password" name="password" value="{{ old('password') }}" />
                            </div>
                        </div>

                        <div class="form-footer">
                            <div class="custom-control custom-checkbox mb-0">
                                <input type="checkbox" class="custom-control-input" id="lost-password" />
                                <label class="custom-control-label mb-0" for="lost-password">{{ __('label.remember_me') }}</label>
                            </div>

                            <a href="{{ route('forgot-password', app()->getLocale()) }}"
                                class="forget-password text-dark form-footer-right">{{ __('title.forgot_password') }}?</a>
                        </div>
                        <button type="submit" class="btn btn-dark btn-md w-100 mb-1">
                            {{ __('title.login') }}
                        </button>
                        <div class="text-center">
                            <span class="text-muted">{{ __('message.dont_have_account') }}</span>
                            <a href="{{ route('register', app()->getLocale()) }}" class="font-weight-bold">{{ __('title.register') }}</a>
                        </div>
                        <div class="text-center mt-3">
                            <span>- {{ __('message.login_with_social') }} -</span>
                        </div>
                        <div class="social-icons text-center mt-1">
                            <a class="btn btn-info btn-icon-left btn-rounded btn-md mr-3" href="{{route('login.redirect','facebook')}}" ><i class="fab fa-facebook-f mr-2"></i>Facebook</a>
                            <a class="btn btn-danger btn-icon-left btn-rounded btn-md" href="{{route('login.redirect','google')}}" ><i class="fab fa-google mr-2"></i>Google+</a>
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

    $("#form_login").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        messages: {
            email: {
                required: "{{ __('message.validation.required') }}",
                email: "{{ __('message.validation.invalid_email') }}",
            },
            password: {
                required: "{{ __('message.validation.password_required') }}",
            },
        },
    });

</script>

@endpush

