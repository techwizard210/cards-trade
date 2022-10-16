@extends('frontend.layout.app')

@section('content')

<main class="main my-account">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">My Account</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('my-account') }}">My account</a></li>
                <li>{{ $title }}</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content pt-2">
        <div class="container">
            <div class="tab-vertical row gutter-lg">

                @include('frontend.user.sidebar')

                <div class="tab-content mb-6">
                    <div class="tab-pane active" id="account-details">
                        <div class="icon-box icon-box-side icon-box-light">
                            <span class="icon-box-icon icon-account mr-2">
                                <i class="w-icon-user"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
                            </div>
                        </div>
                        <form class="form account-details-form" id="account-details-form" action="#" method="post">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">First name *</label>
                                        <input type="text" id="firstname" name="firstname" placeholder="" class="form-control form-control-md" value="{{ $profile->first_name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastname">Last name *</label>
                                        <input type="text" id="lastname" name="lastname" placeholder="" class="form-control form-control-md" value="{{ $profile->last_name }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-6">
                                <label for="email_1">Email address *</label>
                                <input type="email" id="email" name="email" class="form-control form-control-md" value="{{ $profile->email }}">
                            </div>

                            <div class="form-checkbox mb-6">
                                <input type="checkbox" class="custom-checkbox" id="change_pass" name="change_pass">
                                <label for="remember1">Change Password</label>
                            </div>

                            <div id="change-pass-form" style="display: none;">
                                <h4 class="title title-password ls-25 font-weight-bold">Password change</h4>
                                <div class="form-group mb-3">
                                    <label class="text-dark" for="cur-password">Current Password</label>
                                    <input type="password" class="form-control form-control-md"
                                        id="cur-password" name="cur_password">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="text-dark" for="new-password">New Password</label>
                                    <input type="password" class="form-control form-control-md"
                                        id="new-password" name="new_password">
                                </div>
                                <div class="form-group mb-10">
                                    <label class="text-dark" for="conf-password">Confirm Password</label>
                                    <input type="password" class="form-control form-control-md"
                                        id="conf-password" name="conf_password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->
</main>

@endsection

@push('page-script')

<script type="text/javascript">
    $( document ).ready(function() {
        $('#change_pass').on('change', function(){
            if($(this).is(':checked')){
                $('#change-pass-form').slideDown();;
            } else {
                $('#change-pass-form').slideUp();;
            }
        });
        $("#account-details-form").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                firstname: {
                    required: true
                },
                lastname: {
                    required: true
                },
                cur_password: {
                    required: true
                },
                new_password: {
                    required: true,
                    minlength: 6
                },
                conf_password: {
                    required: true,
                    equalTo: '#new-password'
                },
            },
            messages: {
                email: {
                    required: "{{ __('message.validation.required') }}",
                    email: "{{ __('message.validation.invalid_email') }}",
                },
                contact_name: {
                    required: "{{ __('message.validation.required') }}",
                },
                contact_message: {
                    required: "{{ __('message.validation.required') }}",
                },
                cur_message: {
                    required: "{{ __('message.validation.required') }}",
                },
                new_password: {
                    required: "Password is required",
                    minlength: "{{ __('message.validation.password_length_error') }}",
                },
                conf_password: {
                    required: "Confirm password required",
                    equalTo: "Please confirm correct password",
                },
            },
        });

        $("#account-details-form").on('submit', function(e){
            e.preventDefault();
            var form = $(this);
            $(this).validate();
            if($(this).valid()){
                $.ajax({
                    type: "POST",
                    url: "{{ route('profile.update') }}",
                    data: form.serialize(),
                    success: function (response) {
                        if(response.status == 'error') {
                            toastr['error'](response.message, response.title);
                        }
                        else if(response.status == 'success'){
                            toastr['success'](response.message, "Success");
                        } else {
                            toastr['warning']("Sorry, Something went wrong", "Warning");
                        }
                    },
                    error: function(response) {
                        toastr['error']('Server Connection Failed', "Unknown Error");
                    }
                });
            }
        });
    });
</script>

@endpush
