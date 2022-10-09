@extends('user.layout.app')

@section('content')

    <div class="category-banner-container bg-gray">
        <div class="category-banner banner text-uppercase" style="background: no-repeat 60%/cover url('{{ asset('assets/images/elements/page-header.jpg') }}'); padding: 2rem 0 2.4rem 0;">
            <div class="container position-relative">
                <nav aria-label="breadcrumb" class="breadcrumb-nav text-white">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">HOME</a></li>
                        <li class="breadcrumb-item active" aria-current="page">CONTACT US</li>
                    </ol>
                </nav>
                <h1 class="page-title text-center text-white">CONTACT US</h1>
            </div>
        </div>
    </div>

    <div class="container contact-us-container">
        <div class="contact-info">
            <div class="row">
                <div class="col-12">
                    <h2 class="ls-n-25 m-b-2">
                        CONTACT INFO
                    </h2>
                    <p style="font-size: 16px">
                        You can speak to our online representative at any time using our live chat system on our website or any of the instant messaging programs listed below.
                    </p>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="feature-box text-center">
                        <i class="fa fa-map-marker-alt"></i>
                        <div class="feature-box-content">
                            <h3>ADDRESS</h3>
                            <h5>1163 S. Main Street, Ste. 134, Chelsea MI 48118</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="feature-box text-center">
                        <i class="fa fa-mobile-alt"></i>
                        <div class="feature-box-content">
                            <h3>PHONE</h3>
                            <h5>+1 508 322 1918</h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="feature-box text-center">
                        <i class="far fa-envelope"></i>
                        <div class="feature-box-content">
                            <h3>EMAIL</h3>
                            <h5>support@cardcashify.com</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="feature-box text-center">
                        <i class="far fa-calendar-alt"></i>
                        <div class="feature-box-content">
                            <h3>WORKING TIME</h3>
                            <h5>Mon - Sun / 9:00AM - 8:00PM</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h2 class="mt-6 mb-2">{{ __('label.contact_form') }}</h2>
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

                <form action="{{ route('contact.submit', app()->getLocale()) }}" class="mb-0" method="POST" id="form_contact_us">
                    @csrf
                    <div class="form-group">
                        <label class="mb-1" for="contact-name">Full Name
                            <span class="required">*</span></label>
                        <input type="text" class="form-control" id="contact-name" name="contact_name">
                    </div>

                    <div class="form-group">
                        <label class="mb-1" for="contact-email">Email Address
                            <span class="required">*</span></label>
                        <input type="email" class="form-control" id="contact-email" name="contact_email">
                    </div>

                    <div class="form-group">
                        <label class="mb-1" for="contact-message">Your Message
                            <span class="required">*</span></label>
                        <textarea cols="30" rows="1" id="contact-message" class="form-control" name="contact_message"></textarea>
                    </div>

                    <div class="form-footer mb-0">
                        <button type="submit" class="btn btn-dark font-weight-normal">
                            SEND MESSAGE
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 px-5">
                <h2 class="mt-6 mb-1">FAQ</h2>
                <div id="accordion">
                    <div class="card card-accordion">
                        <a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Curabitur eget leo at velit imperdiet viaculis
                            vitaes?
                        </a>

                        <div id="collapseOne" class="collapse" data-parent="#accordion" style="">
                            <p>Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Curabitur eget leo at velit
                                imperdiet varius. In eu ipsum vitae velit
                                congue iaculis vitae at risus. Nullam tortor
                                nunc, bibendum vitae semper a, volutpat eget
                                massa.</p>
                        </div>
                    </div>

                    <div class="card card-accordion">
                        <a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseOne">
                            Curabitur eget leo at velit imperdiet vague
                            iaculis vitaes?
                        </a>

                        <div id="collapseTwo" class="collapse" data-parent="#accordion" style="">
                            <p>Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Curabitur eget leo at velit
                                imperdiet varius. In eu ipsum vitae velit
                                congue iaculis vitae at risus. Nullam tortor
                                nunc, bibendum vitae semper a, volutpat eget
                                massa. Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit. Integer
                                fringilla, orci sit amet posuere auctor,
                                orci eros pellentesque odio, nec
                                pellentesque erat ligula nec massa. Aenean
                                consequat lorem ut felis ullamcorper posuere
                                gravida tellus faucibus. Maecenas dolor
                                elit, pulvinar eu vehicula eu, consequat et
                                lacus. Duis et purus ipsum. In auctor mattis
                                ipsum id molestie. Donec risus nulla,
                                fringilla a rhoncus vitae, semper a massa.
                                Vivamus ullamcorper, enim sit amet consequat
                                laoreet, tortor tortor dictum urna, ut
                                egestas urna ipsum nec libero. Nulla justo
                                leo, molestie vel tempor nec, egestas at
                                massa. Aenean pulvinar, felis porttitor
                                iaculis pulvinar, odio orci sodales odio, ac
                                pulvinar felis quam sit.</p>
                        </div>
                    </div>

                    <div class="card card-accordion">
                        <a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Curabitur eget leo at velit imperdiet viaculis
                            vitaes?
                        </a>

                        <div id="collapseThree" class="collapse" data-parent="#accordion" style="">
                            <p>Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Curabitur eget leo at velit
                                imperdiet varius. In eu ipsum vitae velit
                                congue iaculis vitae at risus. Nullam tortor
                                nunc, bibendum vitae semper a, volutpat eget
                                massa.</p>
                        </div>
                    </div>

                    <div class="card card-accordion">
                        <a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                            Curabitur eget leo at velit imperdiet vague
                            iaculis vitaes?
                        </a>

                        <div id="collapseFour" class="collapse" data-parent="#accordion" style="">
                            <p>Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Curabitur eget leo at velit
                                imperdiet varius. In eu ipsum vitae velit
                                congue iaculis vitae at risus. Nullam tortor
                                nunc, bibendum vitae semper a, volutpat eget
                                massa. Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit. Integer
                                fringilla, orci sit amet posuere auctor,
                                orci eros pellentesque odio, nec
                                pellentesque erat ligula nec massa. Aenean
                                consequat lorem ut felis ullamcorper posuere
                                gravida tellus faucibus. Maecenas dolor
                                elit, pulvinar eu vehicula eu, consequat et
                                lacus. Duis et purus ipsum. In auctor mattis
                                ipsum id molestie. Donec risus nulla,
                                fringilla a rhoncus vitae, semper a massa.
                                Vivamus ullamcorper, enim sit amet consequat
                                laoreet, tortor tortor dictum urna, ut
                                egestas urna ipsum nec libero. Nulla justo
                                leo, molestie vel tempor nec, egestas at
                                massa. Aenean pulvinar, felis porttitor
                                iaculis pulvinar, odio orci sodales odio, ac
                                pulvinar felis quam sit.</p>
                        </div>
                    </div>

                    <div class="card card-accordion">
                        <a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                            Curabitur eget leo at velit imperdiet varius
                            iaculis vitaes?
                        </a>

                        <div id="collapseFive" class="collapse" data-parent="#accordion" style="">
                            <p>Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Curabitur eget leo at velit
                                imperdiet varius. In eu ipsum vitae velit
                                congue iaculis vitae at risus. Nullam tortor
                                nunc, bibendum vitae semper a, volutpat eget
                                massa. Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit. Integer
                                fringilla, orci sit amet posuere auctor,
                                orci eros pellentesque odio, nec
                                pellentesque erat ligula nec massa. Aenean
                                consequat lorem ut felis ullamcorper posuere
                                gravida tellus faucibus. Maecenas dolor
                                elit, pulvinar eu vehicula eu, consequat et
                                lacus. Duis et purus ipsum. In auctor mattis
                                ipsum id molestie. Donec risus nulla,
                                fringilla a rhoncus vitae, semper a massa.
                                Vivamus ullamcorper, enim sit amet consequat
                                laoreet, tortor tortor dictum urna, ut
                                egestas urna ipsum nec libero. Nulla justo
                                leo, molestie vel tempor nec, egestas at
                                massa. Aenean pulvinar, felis porttitor
                                iaculis pulvinar, odio orci sodales odio, ac
                                pulvinar felis quam sit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!-- Map Section -->
	<div id="googlemapsFullWidth" class="google-map mt-5 mb-0"></div>
	<!--/ End Map Section -->

@endsection


@push('page-script')

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCH3Q-9wVOWtspXHy4OovaV6n_par8rBHg"></script>

<script type="text/javascript">

$( document ).ready(function() {
    $("#googlemapsFullWidth").gMap({
				controls: {
					draggable: (($.browser.mobile) ? false : true),
					panControl: true,
					zoomControl: true,
					mapTypeControl: true,
					scaleControl: true,
					streetViewControl: true,
					overviewMapControl: true
				},
				scrollwheel: false,
				latitude: 37.09024,
				longitude: -95.71289,
				zoom: 6
			});
});



    // $("#googlemapsFullWidth").gMap({
    //     controls: {
    //         draggable: (($.browser.mobile) ? false : true),
    //         panControl: true,
    //         zoomControl: true,
    //         mapTypeControl: true,
    //         scaleControl: true,
    //         streetViewControl: true,
    //         overviewMapControl: true
    //     },
    //     scrollwheel: false,
    //     markers: [{
    //         address: "217 Summit Boulevard, Birmingham, AL 35243",
    //         html: "<strong>Alabama Office</strong><br>217 Summit Boulevard, Birmingham, AL 35243",
    //         icon: {
    //             image: "img/pin.png",
    //             iconsize: [26, 46],
    //             iconanchor: [12, 46]
    //         }
    //     },{
    //         address: "645 E. Shaw Avenue, Fresno, CA 93710",
    //         html: "<strong>California Office</strong><br>645 E. Shaw Avenue, Fresno, CA 93710",
    //         icon: {
    //             image: "img/pin.png",
    //             iconsize: [26, 46],
    //             iconanchor: [12, 46]
    //         }
    //     },{
    //         address: "New York, NY 10017",
    //         html: "<strong>New York Office</strong><br>New York, NY 10017",
    //         icon: {
    //             image: "img/pin.png",
    //             iconsize: [26, 46],
    //             iconanchor: [12, 46]
    //         }
    //     }],
    //     latitude: 37.09024,
    //     longitude: -95.71289,
    //     zoom: 3
    // });

    $("#form_contact_us").validate({
        rules: {
            contact_email: {
                required: true,
                email: true
            },
            contact_name: {
                required: true
            },
            contact_message: {
                required: true
            }
        },
        messages: {
            contact_email: {
                required: "{{ __('message.validation.required') }}",
                email: "{{ __('message.validation.invalid_email') }}",
            },
            contact_name: {
                required: "{{ __('message.validation.required') }}",
            },
            contact_message: {
                required: "{{ __('message.validation.required') }}",
            },
        },
    });



</script>

@endpush

