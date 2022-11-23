@extends('frontend.layout.app')

@section('content')
    <main class="main">
        <!-- Start of Breadcrumb -->
        {{-- <nav class="breadcrumb-nav">
            <div class="container">
            </div>
        </nav> --}}
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content" style="color: black; font-size: 16px">
            <div class="container-fluid login-container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('assets/images/bg-auth.jpg') }}" />
                            </div>
                            <div class="col-md-6 pt-5">
                                <form action="{{ route('card.detail') }}" method="get" id="form_register">
                                    @csrf
                                    <div class="form-row row mb-3 text-center">
                                        <div class="form-group col-12">
                                            <img src="images/{{ $offer[0]->gateway }}.png" />
                                        </div>
                                        @if ($offer[0]->gateway == 0)
                                            <div class="form-group col-12">
                                                <h2>Please enter your wallet address</h2>
                                            </div>
                                        @else
                                            <div class="form-group col-12">
                                                <h2>Please enter your account identity</h2>
                                            </div>
                                        @endif
                                        <div class="form-group col-12">
                                            <input type="text" class="form-input form-wide form-control" id="last_name"
                                                name="identity" value="{{ old('last_name') }}"
                                                style="width: 70%;margin: 0 auto;" />
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-dark btn-md w-100 mb-4 mt-2">Next</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="d-flex flex-column align-items-center gateway-container">
                <div class="w-100 d-flex flex-column align-items-center" style="max-width: 700px;margin-top:50px">
                    <img src="images/0.png" />
                    <h2>Please enter your wallet address</h2>
                    <input type="text" class="address-input" name="email" id="email"
                        placeholder="Your Wallet Address" />
                    <button class="btn btn-dark btn-rounded mt-5 blueBtn">Next</button></a>
                </div>
                <div class="w-100 d-flex flex-column align-items-center" style="max-width: 700px;margin-top:50px">
                    <img src="images/1.png" />
                    <h2>Please enter your email</h2>
                    <input type="text" class="address-input" name="email" id="email"
                        placeholder="Your Wallet Address" />
                </div>
            </div> --}}
        </div>
        <!-- End of Page Content -->
    </main>
@endsection

@push('page-script')
@endpush
