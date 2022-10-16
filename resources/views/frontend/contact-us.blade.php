@extends('frontend.layout.app')

@section('content')

<main class="main">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">Contact Us</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav mb-10 pb-1">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content contact-us">
        <div class="container">
            <section class="content-title-section mb-10">
                <h3 class="title title-center mb-3">Contact Information</h3>
                <p class="text-center">You can speak to our online representative at any time using our live chat system on our website or any of the instant messaging programs listed below.</p>
            </section>
            <!-- End of Contact Title Section -->

            <section class="contact-information-section mb-10">
                <div class=" swiper-container swiper-theme " data-swiper-options="{
                    'spaceBetween': 20,
                    'slidesPerView': 1,
                    'breakpoints': {
                        '480': {
                            'slidesPerView': 2
                        },
                        '768': {
                            'slidesPerView': 3
                        },
                        '992': {
                            'slidesPerView': 4
                        }
                    }
                }">
                    <div class="swiper-wrapper row cols-xl-4 cols-md-3 cols-sm-2 cols-1">
                        <div class="swiper-slide icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-email">
                                <i class="w-icon-envelop-closed"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">E-mail Address</h4>
                                <p>support@cardcashify.com</p>
                            </div>
                        </div>
                        <div class="swiper-slide icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-hotline">
                                <i class="w-icon-hotline"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Phone Number</h4>
                                <p>+1 508 322 1918</p>
                            </div>
                        </div>
                        <div class="swiper-slide icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-map-marker">
                                <i class="w-icon-map-marker"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Address</h4>
                                <p>1163 S. Main Street, Ste. 134<br>Chelsea MI 48118</p>
                            </div>
                        </div>
                        <div class="swiper-slide icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-headphone">
                                <i class="w-icon-headphone"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Working Time</h4>
                                <p>Mon - Sun / 9:00AM - 8:00PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End of Contact Information section -->

            <hr class="divider mb-10 pb-1">

            <section class="contact-section">
                <div class="row gutter-lg pb-3">
                    <div class="col-lg-6 mb-8">
                        <h4 class="title mb-3">People usually ask these</h4>
                        <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                            <div class="card">
                                <div class="card-header">
                                    <a href="#collapse1" class="collapse">How can I cancel my order?</a>
                                </div>
                                <div id="collapse1" class="card-body expanded">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp orincid
                                        idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu sceler
                                        isque felis. Vel pretium.
                                    </p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <a href="#collapse2" class="expand">Why is my registration delayed?</a>
                                </div>
                                <div id="collapse2" class="card-body collapsed">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp orincid
                                        idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu sceler
                                        isque felis. Vel pretium.
                                    </p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <a href="#collapse3" class="expand">What do I need to buy products?</a>
                                </div>
                                <div id="collapse3" class="card-body collapsed">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp orincid
                                        idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu sceler
                                        isque felis. Vel pretium.
                                    </p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <a href="#collapse4" class="expand">How can I track an order?</a>
                                </div>
                                <div id="collapse4" class="card-body collapsed">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp orincid
                                        idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu sceler
                                        isque felis. Vel pretium.
                                    </p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <a href="#collapse5" class="expand">How can I get money back?</a>
                                </div>
                                <div id="collapse5" class="card-body collapsed">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        temp orincid idunt ut labore et dolore magna aliqua. Venenatis tellus in
                                        metus vulp utate eu sceler isque felis. Vel pretium.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-8">
                        <h4 class="title mb-3">Send Us a Message</h4>
                        <form class="form contact-us-form" action="#" method="post">
                            <div class="form-group">
                                <label for="username">Your Name</label>
                                <input type="text" id="username" name="username"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email_1">Your Email</label>
                                <input type="email" id="email_1" name="email_1"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="message">Your Message</label>
                                <textarea id="message" name="message" cols="30" rows="5"
                                    class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-dark btn-rounded">Send Now</button>
                        </form>
                    </div>
                </div>
            </section>
            <!-- End of Contact Section -->
        </div>

        <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
        <div class="google-map contact-google-map" id="googlemaps"></div>
        <!-- End Map Section -->
    </div>
    <!-- End of PageContent -->
</main>

@endsection

@push('page-script')

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCH3Q-9wVOWtspXHy4OovaV6n_par8rBHg"></script>

<script type="text/javascript">

$( document ).ready(function() {
    /*
    Map Settings
        Find the Latitude and Longitude of your address:
            - https://www.latlong.net/
            - http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/
    */

    // Map Markers
    var mapMarkers = [{
        address: "Chelsea, MI 48118",
        html: "<strong>1163 S. Main Street, Ste. 134<\/strong><br>Chelsea, MI 48118",
        popup: true
    }];

    // Map Initial Location
    var initLatitude = 42.303630;
    var initLongitude = -84.021990;

    // Map Extended Settings
    var mapSettings = {
        controls: {
            draggable: !window.Wolmart.isMobile,
            panControl: true,
            zoomControl: true,
            mapTypeControl: true,
            scaleControl: true,
            streetViewControl: true,
            overviewMapControl: true
        },
        styles: [
            { elementType: "geometry", stylers: [{ color: "#242f3e" }] },
            { elementType: "labels.text.stroke", stylers: [{ color: "#242f3e" }] },
            { elementType: "labels.text.fill", stylers: [{ color: "#746855" }] },
            {
                "featureType":"water",
                "elementType":"geometry",
                "stylers":[{"color":"#e9e9e9"},{"lightness":17}]
            },
            {
                "featureType":"landscape",
                "elementType":"geometry",
                "stylers":[{"color":"#f5f5f5"},{"lightness":20}]
            },
            {
                "featureType":"road.highway",
                "elementType":"geometry.fill",
                "stylers":[{"color":"#ffffff"},{"lightness":17}]
            },
            {
                "featureType":"road.highway",
                "elementType":"geometry.stroke",
                "stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]
            },
            {
                "featureType":"road.arterial",
                "elementType":"geometry",
                "stylers":[{"color":"#ffffff"},{"lightness":18}]
            },
            {
                "featureType":"road.local",
                "elementType":"geometry",
                "stylers":[{"color":"#ffffff"},{"lightness":16}]
            },
            {
                "featureType":"poi",
                "elementType":"geometry",
                "stylers":[{"color":"#f5f5f5"},{"lightness":21}]
            },
            {
                "featureType":"poi.park",
                "elementType":"geometry",
                "stylers":[{"color":"#dedede"},{"lightness":21}]
            },
            {
                "elementType":"labels.text.stroke",
                "stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]
            },
            {
                "elementType":"labels.text.fill",
                "stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]
            },
            {
                "elementType":"labels.icon",
                "stylers":[{"visibility":"off"}]
            },
            {
                "featureType":"transit",
                "elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]
            },
            {
                "featureType":"administrative",
                "elementType":"geometry.fill",
                "stylers":[{"color":"#fefefe"},{"lightness":20}]
            },
            {
                "featureType":"administrative",
                "elementType":"geometry.stroke",
                "stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]
            }
        ],
        scrollwheel: false,
        markers: mapMarkers,
        latitude: initLatitude,
        longitude: initLongitude,
        zoom: 11
    };

    var map = $( '#googlemaps' ).gMap( mapSettings );

    // Map text-center At
    var mapCenterAt = function ( options, e ) {
        e.preventDefault();
        $( '#googlemaps' ).gMap( "centerAt", options );
    }
});

    // $("#form_contact_us").validate({
    //     rules: {
    //         contact_email: {
    //             required: true,
    //             email: true
    //         },
    //         contact_name: {
    //             required: true
    //         },
    //         contact_message: {
    //             required: true
    //         }
    //     },
    //     messages: {
    //         contact_email: {
    //             required: "{{ __('message.validation.required') }}",
    //             email: "{{ __('message.validation.invalid_email') }}",
    //         },
    //         contact_name: {
    //             required: "{{ __('message.validation.required') }}",
    //         },
    //         contact_message: {
    //             required: "{{ __('message.validation.required') }}",
    //         },
    //     },
    // });



</script>

@endpush
