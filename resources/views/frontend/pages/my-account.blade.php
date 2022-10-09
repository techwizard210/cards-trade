@extends('frontend.layout.app')

@section('content')

<div class="page-header" style="background: no-repeat 60%/cover url({{ asset('assets/images/elements/page-header-auth.jpg') }});">
    <div class="container d-flex flex-column align-items-center">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb" style="color: #222529;">
                    <li class="breadcrumb-item"><a href="{{ route('home', app()->getLocale()) }}">Home</a></li>
                    <li class="breadcrumb-item">{{ __('label.my_account') }}</li>
                    <li class="breadcrumb-item active" aria-current="page">DASHBOARD</li>
                </ol>
            </div>
        </nav>

        <h1>{{ __('label.my_account') }}</h1>
    </div>
</div>

<div class="container account-container custom-account-container">
    <div class="row">
        <div class="sidebar widget widget-dashboard mb-lg-0 mb-3 col-lg-3 order-0">
            <h2 class="text-uppercase">{{ __('label.my_account') }}</h2>
            <ul class="nav nav-tabs list flex-column mb-0" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard"
                        role="tab" aria-controls="dashboard" aria-selected="true">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="order-tab" data-toggle="tab" href="#order" role="tab"
                        aria-controls="order" aria-selected="true">{{ __('label.orders') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="download-tab" data-toggle="tab" href="#download" role="tab"
                        aria-controls="download" aria-selected="false">Downloads</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab"
                        aria-controls="address" aria-selected="false">{{ __('label.addresses') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab"
                        aria-controls="edit" aria-selected="false">{{ __('title.account_details') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="shop-address-tab" data-toggle="tab" href="#shipping" role="tab"
                        aria-controls="edit" aria-selected="false">Shopping Addres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('wishlist', app()->getLocale()) }}">{{ __('title.wishlist') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout', app()->getLocale()) }}">{{ __('title.logout') }}</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-9 order-lg-last order-1 tab-content">
            <div class="tab-pane fade show active" id="dashboard" role="tabpanel">
                <div class="dashboard-content">

                    <p class="dashboard-content-title">
                        {{ __('message.home.hello') }} <strong class="text-dark">{{ Auth::guard('user')->user()->name }}</strong>
                    </p>

                    <p>
                        From your account dashboard you can view your
                        <a class="btn btn-link link-to-tab" href="#order">recent orders</a>,
                        manage your
                        <a class="btn btn-link link-to-tab" href="#address">shipping and billing
                            addresses</a>, and edit your
                        <a class="btn btn-link link-to-tab" href="#edit">password and account details.</a>
                    </p>

                    <div class="mb-4"></div>


                    <div class="mb-4"></div>

                    <div class="row row-lg">
                        <div class="col-6 col-md-4">
                            <div class="feature-box text-center pb-4">
                                <a href="#order" class="link-to-tab"><i
                                        class="sicon-social-dropbox"></i></a>
                                <div class="feature-box-content">
                                    <h3>{{ __('label.orders') }}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-4">
                            <div class="feature-box text-center pb-4">
                                <a href="#download" class="link-to-tab"><i
                                        class="sicon-cloud-download"></i></a>
                                <div class=" feature-box-content">
                                    <h3>DOWNLOADS</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-4">
                            <div class="feature-box text-center pb-4">
                                <a href="#address" class="link-to-tab"><i
                                        class="sicon-location-pin"></i></a>
                                <div class="feature-box-content">
                                    <h3>{{ __('label.addresses') }}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-4">
                            <div class="feature-box text-center pb-4">
                                <a href="#edit" class="link-to-tab"><i class="icon-user-2"></i></a>
                                <div class="feature-box-content p-0">
                                    <h3>{{ __('title.account_details') }}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-4">
                            <div class="feature-box text-center pb-4">
                                <a href="{{ route('wishlist', app()->getLocale()) }}"><i class="sicon-heart"></i></a>
                                <div class="feature-box-content">
                                    <h3>{{ __('title.wishlist') }}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-4">
                            <div class="feature-box text-center pb-4">
                                <a href="{{ route('logout', app()->getLocale()) }}"><i class="sicon-logout"></i></a>
                                <div class="feature-box-content">
                                    <h3>{{ __('title.logout') }}</h3>
                                </div>
                            </div>
                        </div>
                    </div><!-- End .row -->
                </div>
            </div><!-- End .tab-pane -->

            <div class="tab-pane fade" id="order" role="tabpanel">
                <div class="order-content">
                    <h3 class="account-sub-title d-none d-md-block"><i
                            class="sicon-social-dropbox align-middle mr-3"></i>{{ __('label.orders') }}</h3>
                    <div class="order-table-container text-center">
                        <table class="table table-order text-left">
                            <thead>
                                <tr>
                                    <th class="order-id text-uppercase">{{ __('label.order') }}</th>
                                    <th class="order-date text-uppercase">{{ __('label.date') }}</th>
                                    <th class="order-status text-uppercase">{{ __('label.status') }}</th>
                                    <th class="order-price text-uppercase">{{ __('label.total') }}</th>
                                    <th class="order-action text-uppercase">{{ __('label.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $list)
                                <tr>
                                    <td>{{ $list->order_number }}</td>
                                    <td>{{ $list->created_at }}</td>
                                    <td>{{ $list->status }}</td>
                                    <td>{{ $list->currency }} {{ number_format($list->total_amount * $list->rate, 2) }}</td>
                                    <td></td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center p-0" colspan="5">
                                        <p class="mb-5 mt-5">
                                            {{ __('message.home.no_order_exist') }}
                                        </p>
                                    </td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                        <hr class="mt-0 mb-3 pb-2" />

                        <a href="{{ route('products', app()->getLocale()) }}" class="btn btn-dark">{{ __('label.go_shop') }}</a>
                    </div>
                </div>
            </div><!-- End .tab-pane -->

            <div class="tab-pane fade" id="download" role="tabpanel">
                <div class="download-content">
                    <h3 class="account-sub-title d-none d-md-block"><i
                            class="sicon-cloud-download align-middle mr-3"></i>Downloads</h3>
                    <div class="download-table-container">
                        <p>No downloads available yet.</p> <a href="category.html"
                            class="btn btn-primary text-transform-none mb-2">GO SHOP</a>
                    </div>
                </div>
            </div><!-- End .tab-pane -->

            <div class="tab-pane fade" id="address" role="tabpanel">
                <h3 class="account-sub-title d-none d-md-block mb-1"><i
                        class="sicon-location-pin align-middle mr-3"></i>{{ __('label.addresses') }}</h3>
                <div class="addresses-content">
                    <p class="mb-4">
                        The following addresses will be used on the checkout page by
                        default.
                    </p>

                    <div class="row">
                        <div class="address col-md-6">
                            <div class="heading d-flex">
                                <h4 class="text-dark mb-0">Billing address</h4>
                            </div>

                            <div class="address-box">
                                You have not set up this type of address yet.
                            </div>

                            <a href="#billing" class="btn btn-default address-action link-to-tab">Add
                                Address</a>
                        </div>

                        <div class="address col-md-6 mt-5 mt-md-0">
                            <div class="heading d-flex">
                                <h4 class="text-dark mb-0">
                                    Shipping address
                                </h4>
                            </div>

                            <div class="address-box">
                                You have not set up this type of address yet.
                            </div>

                            <a href="#shipping" class="btn btn-default address-action link-to-tab">Add
                                Address</a>
                        </div>
                    </div>
                </div>
            </div><!-- End .tab-pane -->

            <div class="tab-pane fade" id="edit" role="tabpanel">
                <h3 class="account-sub-title d-none d-md-block mt-0 pt-1 ml-1"><i
                        class="icon-user-2 align-middle mr-3 pr-1"></i>{{ __('title.account_details') }}</h3>
                <div class="account-content">
                    <form action="#" id="form-account-detail">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="acc-text">{{ __('label.full_name') }} <span class="required">*</span></label>
                            <input type="text" class="form-control" id="acc_name" name="acc_name"
                                placeholder="{{ __('label.full_name') }}" required value="{{ $profile->name }}"/>
                            <p style="font-size: 1.2rem; margin-top:0.5rem;">This will be how your name will be displayed in the account section and in reviews</p>
                        </div>


                        <div class="form-group mb-4">
                            <label for="acc-email">{{ __('label.email_address') }} <span class="required">*</span></label>
                            <input type="email" class="form-control" id="acc_email" name="acc_email"
                                placeholder="user@example.com" value="{{ $profile->email }}" required />
                        </div>

                        <div class="form-group mb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="create-account" name="is_pass_change" />
                                <label class="custom-control-label" data-toggle="collapse" data-target="#collapseThree" aria-controls="collapseThree" for="create-account">{{ __('label.password_change') }}?</label>
                            </div>
                        </div>

                        <div class="change-password collapse" id="collapseThree">
                            <h3 class="text-uppercase mb-2">{{ __('label.password_change') }}</h3>

                            <div class="form-group">
                                <label for="acc-password">{{ __('label.current_password') }} <span class="required">*</span></label>
                                <input type="password" class="form-control" id="acc_password"
                                    name="acc_password" />
                            </div>

                            <div class="form-group">
                                <label for="acc-password">{{ __('label.new_password') }} <span class="required">*</span></label>
                                <input type="password" class="form-control" id="acc_new_password"
                                    name="acc_new_password" />
                            </div>

                            <div class="form-group">
                                <label for="acc-password">{{ __('label.confirm_password') }} <span class="required">*</span></label>
                                <input type="password" class="form-control" id="acc_confirm_password"
                                    name="acc_confirm_password" />
                            </div>
                        </div>

                        <div class="form-footer mt-3 mb-0">
                            <button type="submit" class="btn btn-dark mr-0">
                                @lang('label.save_changes')
                            </button>
                        </div>
                    </form>
                </div>
            </div><!-- End .tab-pane -->

            <div class="tab-pane fade" id="billing" role="tabpanel">
                <div class="address account-content mt-0 pt-2">
                    <h4 class="title">Billing address</h4>

                    <form class="mb-2" action="#">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First name <span class="required">*</span></label>
                                    <input type="text" class="form-control" required />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last name <span class="required">*</span></label>
                                    <input type="text" class="form-control" required />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Company </label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="select-custom">
                            <label>Country / Region <span class="required">*</span></label>
                            <select name="orderby" class="form-control">
                                <option value="" selected="selected">British Indian Ocean Territory
                                </option>
                                <option value="1">Brunei</option>
                                <option value="2">Bulgaria</option>
                                <option value="3">Burkina Faso</option>
                                <option value="4">Burundi</option>
                                <option value="5">Cameroon</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Street address <span class="required">*</span></label>
                            <input type="text" class="form-control"
                                placeholder="House number and street name" required />
                            <input type="text" class="form-control"
                                placeholder="Apartment, suite, unit, etc. (optional)" required />
                        </div>

                        <div class="form-group">
                            <label>Town / City <span class="required">*</span></label>
                            <input type="text" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label>State / Country <span class="required">*</span></label>
                            <input type="text" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label>Postcode / ZIP <span class="required">*</span></label>
                            <input type="text" class="form-control" required />
                        </div>

                        <div class="form-group mb-3">
                            <label>Phone <span class="required">*</span></label>
                            <input type="number" class="form-control" required />
                        </div>

                        <div class="form-group mb-3">
                            <label>Email address <span class="required">*</span></label>
                            <input type="email" class="form-control" placeholder="editor@gmail.com"
                                required />
                        </div>

                        <div class="form-footer mb-0">
                            <div class="form-footer-right">
                                <button type="submit" class="btn btn-dark py-4">
                                    Save Address
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- End .tab-pane -->

            <div class="tab-pane fade" id="shipping" role="tabpanel">
                <div class="address account-content mt-0 pt-2">
                    <h4 class="title mb-3">Shipping Address</h4>

                    <form class="mb-2" action="#">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First name <span class="required">*</span></label>
                                    <input type="text" class="form-control" required />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last name <span class="required">*</span></label>
                                    <input type="text" class="form-control" required />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Company </label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="select-custom">
                            <label>Country / Region <span class="required">*</span></label>
                            <select name="orderby" class="form-control">
                                <option value="" selected="selected">British Indian Ocean Territory
                                </option>
                                <option value="1">Brunei</option>
                                <option value="2">Bulgaria</option>
                                <option value="3">Burkina Faso</option>
                                <option value="4">Burundi</option>
                                <option value="5">Cameroon</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Street address <span class="required">*</span></label>
                            <input type="text" class="form-control"
                                placeholder="House number and street name" required />
                            <input type="text" class="form-control"
                                placeholder="Apartment, suite, unit, etc. (optional)" required />
                        </div>

                        <div class="form-group">
                            <label>Town / City <span class="required">*</span></label>
                            <input type="text" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label>State / Country <span class="required">*</span></label>
                            <input type="text" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label>Postcode / ZIP <span class="required">*</span></label>
                            <input type="text" class="form-control" required />
                        </div>

                        <div class="form-footer mb-0">
                            <div class="form-footer-right">
                                <button type="submit" class="btn btn-dark py-4">
                                    Save Address
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .row -->
</div><!-- End .container -->

<div class="mb-5"></div>

@endsection

@push('page-scripts')

<script type="text/javascript">

    $("#form-account-detail").validate({
        rules: {
            acc_email: {
                required: true,
                email: true
            },
            acc_name: {
                required: true
            },
            acc_password: {
                required: true
            },
            acc_new_password: {
                required: true,
                minlength: 6
            },
            acc_confirm_password: {
                required: true,
                equalTo: '#acc_new_password'
            },
        },
        messages: {
            acc_email: {
                required: "{{ __('message.validation.required') }}",
                email: "{{ __('message.validation.invalid_email') }}",
            },
            acc_name: {
                required: "{{ __('message.validation.required') }}",
            },
            acc_password: {
                required: "{{ __('message.validation.required') }}",
            },
            acc_new_password: {
                required: "{{ __('message.validation.password_required') }}",
                minlength: "{{ __('message.validation.password_length_error') }}",
            },
            acc_confirm_password: {
                required: "{{ __('message.validation.confirm_password_required') }}",
                equalTo: "{{ __('message.validation.confirm_password_error') }}",
            },
        },
    });

    $("#form-account-detail").on('submit', function(e){
        e.preventDefault();
        var form = $(this);
        $(this).validate();
        if($(this).valid()){
            $.ajax({
                type: "POST",
                url: "{{ route('profile.update', app()->getLocale()) }}",
                data: form.serialize(),
                success: function (response) {
                    if(response.status == 'error') {
                        Swal.fire(response.title, response.message, "error");
                    }
                    else if(response.status == 'success'){
                        Swal.fire("Update Success", response.message, "success");
                    } else {
                        Swal.fire("Warning", JSON_MESSAGE.response.something_wrong, "warning");
                    }
                },
                error: function(response) {
                    Swal.fire("Unknown Error", JSON_MESSAGE.response.unknown_error, "error");
                }
            });
        }
    });

</script>

@endpush
