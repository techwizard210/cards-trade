@extends('frontend.layout.app')

@section('content')
<main class="main ">
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">Sign Up</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Sign Up</li>
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
                    <form action="{{ route('register.submit') }}" method="POST" id="form_register">
                        @csrf
                        <div class="form-row row mb-3">
                            <div class="form-group col-6">
                                <label for="name">First Name<span class="required">*</span></label>
                                <input type="text" class="form-input form-wide form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" />
                            </div>
                            <div class="form-group col-6">
                                <label for="name">Last Name<span class="required">*</span></label>
                                <input type="text" class="form-input form-wide form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" />
                            </div>
                        </div>
                        <div class="form-row row mb-3">
                            <div class="form-group col-6">
                                <label for="email">Email<span class="required">*</span></label>
                                <input type="email" class="form-input form-wide form-control" id="semail" name="email" value="{{ old('email') }}" />
                            </div>
                            <div class="form-group col-6">
                                <label for="name">Phone<span class="required">*</span></label>
                                <input type="text" class="form-input form-wide form-control" id="phone" name="phone" value="{{ old('phone') }}" />
                            </div>
                        </div>
                        <div class="form-row row mb-3">
                            <div class="form-group col-6">
                                <label for="email">Country<span class="required">*</span></label>
                                <select class="form-control" name="country">
                                    <option value="233" {{ old('country') == '233' ? 'selected' : '' }}>United States</option>
                                    <option value="232" {{ old('country') == '232' ? 'selected' : '' }}>United Kingdom</option>
                                    <option value="39" {{ old('country') == '39' ? 'selected' : '' }}>Canada</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="name">ZIP Code</label>
                                <input type="text" class="form-input form-wide form-control" id="post_code" name="post_code" value="{{ old('post_code') }}" />
                            </div>
                        </div>

                        <div class="form-row row mb-3">
                            <div class="form-group col-6">
                                <label for="password">Password<span class="required">*</span></label>
                                <input type="password" class="form-input form-wide form-control" id="password" name="password" value="{{ old('password') }}" />
                            </div>
                            <div class="form-group col-6">
                                <label for="confirm-password">Confirm Password<span class="required">*</span></label>
                                <input type="password" class="form-input form-wide form-control" id="confirm-password" name="confirm_password" value="{{ old('confirm_password') }}" />
                            </div>
                        </div>

                        {{-- {!! htmlFormSnippet() !!} --}}

                        <button type="submit" class="btn btn-dark btn-md w-100 mb-1 mt-2">SignUp</button>
                        <div class="text-center mb-5">
                            <span class="text-muted">Already have an account?</span>
                            <a href="{{ route('login') }}" class="font-weight-bold">SignIn</a>
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

    $("#form_register").validate({
        rules: {
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            phone: {
                required: true,
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: '{{ route('check-email') }}',
                    type: "post",
                    data: {
                        email: $("#email").val(),
                        _token: "{{ csrf_token() }}"
                    },
                    dataFilter: function (data) {

                        var json = JSON.parse(data);

                        if(json.msg == 'exists'){
                            return "\"" + "This email address is already in use." + "\"";
                        } else {
                            return "true";
                        }
                    }
                }
            },
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
            first_name: {
                required: "This field is required",
            },
            last_name: {
                required: "This field is required",
            },
            phone: {
                required: "Phone Number required",
            },
            email: {
                required: "This field is required",
                email: "Invalid email address, please try with correct email",
                remote: "This email already in use.",
            },
            password: {
                required: "Password is required",
                minlength: "Password length should be more than 6",
            },
            confirm_password: {
                required: "Confirm password required",
                equalTo: "Please confirm correct password",
            },
        },
    });

</script>

@endpush

