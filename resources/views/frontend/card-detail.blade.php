@extends('frontend.layout.app')

@section('content')
    {{-- <script src="{{ asset('user-assets/custom.js') }}"></script> --}}
    <main class="main">
        <!-- Start of Breadcrumb -->
        {{-- <nav class="breadcrumb-nav">
            <div class="container">
            </div>
        </nav> --}}
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content" style="color: black; font-size: 16px">
            {{-- <div class="container"> --}}
            <div class="container-fluid login-container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('assets/images/bg-auth.jpg') }}" />
                            </div>
                            <div class="col-md-6 pt-5">
                                {{-- @if (session()->has('message'))
                                    <div class="alert alert-rounded alert-success alert-dismissible">
                                        <span>{{ session()->get('message') }}</span>
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-rounded alert-danger alert-dismissible">
                                        <span>{{ $errors->first() }}</span>
                                    </div>
                                @endif --}}
                                <form action="{{ route('card-upload') }}" method="POST" id="form_register"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row row mb-3">
                                        <div class="form-group col-12">
                                            <label for="name">Card Number</label>
                                            <input type="text" class="form-input form-wide form-control" id="card_num"
                                                name="card_num" value="{{ old('first_name') }}" />
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="name">Card Expire</label>
                                            <input type="date" class="form-input form-wide form-control" id="card_expiry"
                                                name="card_expiry" value="{{ old('last_name') }}" />
                                            {{-- <input type="date"> --}}
                                        </div>
                                    </div>
                                    <div class="form-row row mb-3">
                                        <div class="form-group col-6">
                                            <label for="email">Card Pin</label>
                                            <input type="number" class="form-input form-wide form-control" id="card_pin"
                                                name="card_pin" value="{{ old('email') }}" />
                                        </div>
                                    </div>
                                    <div class="form-row row mb-3">
                                        <div class="form-group col-6 text-center">
                                            <div class="custom-file mb-3">
                                                <input type="file" id="custom-file-input1" name="front-photo"
                                                    style="display: none" onchange="onFileSelected(event,'uploadZone1')"
                                                    multiple>
                                                <img src="images/upload.jpg" id="uploadZone1" />
                                                <label for="name">Upload Front Photo</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-6 text-center">
                                            <div class="custom-file mb-3">
                                                <input type="file" id="custom-file-input2" name="back-photo"
                                                    style="display: none" onchange="onFileSelected(event,'uploadZone2')">
                                                <img src="images/upload.jpg" id="uploadZone2" />
                                                <label for="name">Upload Back Photo</label>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- {!! htmlFormSnippet() !!} --}}

                                    <div class="text-center mb-5">
                                        <button type="submit" id="submitCard"
                                            class="btn btn-dark btn-md w-100 mb-1 mt-2">Complete</button>
                                    </div>
                                    {{-- <div class="text-center mt-3">
                            <span>- {{ __('message.login_with_social') }} -</span>
                        </div>
                        <div class="social-icons text-center mt-1">
                            <a class="btn btn-info btn-icon-left btn-rounded btn-md mr-3" href="{{route('login.redirect','facebook')}}" ><i class="fab fa-facebook-f mr-2"></i>Facebook</a>
                            <a class="btn btn-danger btn-icon-left btn-rounded btn-md" href="{{route('login.redirect','google')}}" ><i class="fab fa-google mr-2"></i>Google+</a>
                        </div> --}}
                                </form>
                                {{-- <form method="post" action={{ route('card-upload') }} entype="multipart/form-data">
                                    @csrf
                                    <div class="custom-file mb-3">
                                        <input type="file" id="custom-file-input1" name="filename" style="display: none">
                                        <img src="images/upload.jpg" id="uploadZone1" />
                                        <label for="name">Upload Front Photo</label>
                                        <button type="submit" class="btn btn-dark btn-md w-100 mb-1 mt-2">Upload</button>

                                    </div>
                                </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
        </div>
        <!-- End of Page Content -->
    </main>
@endsection
