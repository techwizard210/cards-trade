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
                    <div class="tab-pane active" id="account-downloads">
                        <div class="icon-box icon-box-side icon-box-light">
                            <span class="icon-box-icon icon-downloads mr-2">
                                <i class="w-icon-download"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title ls-normal">Downloads</h4>
                            </div>
                        </div>
                        <p class="mb-4">No downloads available yet.</p>
                        <a href="{{ route('buy') }}" class="btn btn-dark btn-rounded btn-icon-right">Go
                            Shop<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->
</main>

@endsection
