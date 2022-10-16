@extends('frontend.layout.app')

@section('content')

<main class="main login-page">

    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">Sign In</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Sign In</li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid login-container mt-5">
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
                        <form action="{{ route('login.submit') }}" method="POST" id="form_login">
                            @csrf
                            <div class="form-row mb-3">
                                <div class="form-group col">
                                    <label for="login-email">Email<span class="required">*</span></label>
                                    <input type="email" class="form-control form-input form-wide" id="email" name="email" value="{{ old('email') }}" />
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="form-group col">
                                    <label for="login-password">Password<span class="required">*</span></label>
                                    <input type="password" class="form-control form-input form-wide" id="password" name="password" value="{{ old('password') }}" />
                                </div>
                            </div>

                            <div class="form-footer">
                                <div class="custom-control custom-checkbox mb-0">
                                    <input type="checkbox" class="form-control custom-control-input" id="lost-password" />
                                    <label class="custom-control-label mb-0" for="lost-password">Remember Me</label>
                                </div>

                                {{-- <a href="{{ route('forgot-password') }}"
                                    class="forget-password text-dark form-footer-right">Forgot Password?
                                </a> --}}
                            </div>
                            <button type="submit" class="btn btn-dark btn-md w-100 mb-1 mt-5">
                                SignIn
                            </button>
                            <div class="text-center">
                                <span class="text-muted">You don't have an account?</span>
                                <a href="{{ route('register') }}" class="font-weight-bold">SignUp</a>
                            </div>
                            {{-- <div class="text-center mt-3">
                                <span>- {{ __('message.login_with_social') }} -</span>
                            </div>
                            <div class="social-icons text-center mt-1">
                                <a class="btn btn-info btn-icon-left btn-rounded btn-md mr-3" href="{{route('login.redirect','facebook')}}" ><i class="fab fa-facebook-f mr-2"></i>Facebook</a>
                                <a class="btn btn-danger btn-icon-left btn-rounded btn-md" href="{{route('login.redirect','google')}}" ><i class="fab fa-google mr-2"></i>Google+</a>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

@endsection

@push('page-script')

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
                required: "Email is required",
                email: "Invalid Email",
            },
            password: {
                required: "Password required",
            },
        },
    });

</script>

@endpush
