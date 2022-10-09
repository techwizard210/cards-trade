@extends('user.layout.app')

@section('content')

    <div class="page-header page-header-bg text-left" style="background: 50%/cover #D4E1EA url('{{ asset('assets/images/page-header-bg.jpg') }}');">
        <div class="container">
            <h1 class="text-uppercase">
                <span>ABOUT US</span>
                CardsTrade
            </h1>
            <a href="{{ route('contact-us') }}" class="btn btn-dark">CONTACT US</a>
        </div>
    </div>

    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">ABOUT US</li>
            </ol>
        </div>
    </nav>

    <div class="about-section">
        <div class="container">
            <h2 class="subtitle">WHO WE ARE?</h2>
            <p class="lead">"We are a Michigan based company. We understand that superior customer service is our only competitive advantage and we strive to be the best in our areas of expertise."</p>
            <h2 class="subtitle">WHAT WE DO?</h2>
            <p class="lead">“In 2011, we began buying and selling gift cards online and in mail. Our goal is to offer a simple, safe, and convenient way to buy and sell gift cards. Hence, we offer a Warranty with each gift card purchase and strive to complete our transaction with you with integrity. Also, we are a small, Chelsea, Michigan-based company that has been in business since 2011. We have lived in Michigan for over 40 years and are committed to our community.”</p>
        </div>
    </div>

    <div class="features-section bg-gray">
        <div class="container">
            <h2 class="subtitle text-uppercase">{{ __('message.home.why_choose_us') }}</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="feature-box bg-white">
                        <i class="icon-shipped"></i>

                        <div class="feature-box-content p-0">
                            <h3>Faster processing and payment</h3>
                            <p>Cut your processing and payment time by dealing with a local or regional provider.</p>
                        </div><!-- End .feature-box-content -->
                    </div><!-- End .feature-box -->
                </div><!-- End .col-lg-4 -->

                <div class="col-lg-4">
                    <div class="feature-box bg-white">
                        <i class="icon-us-dollar"></i>

                        <div class="feature-box-content p-0">
                            <h3>Receive your payment via check</h3>
                            <p>Receive your payment in the mail via check.</p>
                        </div><!-- End .feature-box-content -->
                    </div><!-- End .feature-box -->
                </div><!-- End .col-lg-4 -->

                <div class="col-lg-4">
                    <div class="feature-box bg-white">
                        <i class="icon-online-support"></i>

                        <div class="feature-box-content p-0">
                            <h3>99% CUSTOMER SATISFACTION</h3>
                            <p>Don’t believe It? Check out our latest eBay Feedback rating by clicking the text above!</p>
                        </div><!-- End .feature-box-content -->
                    </div><!-- End .feature-box -->
                </div><!-- End .col-lg-4 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div>

    <div class="testimonials-section">
        <div class="container">
            <h2 class="subtitle text-center text-uppercase">{{ __('label.happy_clients') }}</h2>

            <div class="testimonials-carousel owl-carousel owl-theme images-left" data-owl-options="{
                'margin': 20,
                'lazyLoad': true,
                'autoHeight': true,
                'dots': false,
                'responsive': {
                    '0': {
                        'items': 1
                    },
                    '992': {
                        'items': 2
                    }
                }
            }">
                <div class="testimonial">
                    <div class="testimonial-owner">
                        <figure>
                            <img src="{{ asset('assets/images/clients/client1.png') }}" alt="client">
                        </figure>

                        <div>
                            <strong class="testimonial-title">Alexandria Gandolfo</strong>
                            <span>Fort Myers, Florida</span>
                        </div>
                    </div><!-- End .testimonial-owner -->

                    <blockquote>
                        <p>This company is amazing! I was skeptical at first; however my check came quickly.
                            In fact, my favorite part was that when I had a question about the process someone on the online chat quickly responded to me.
                            And when my check was ready to go out, I got a personal phone call confirming my address! Completely professional and so very friendly!
                            This is the site to use for your unwanted gift cards!!</p>
                    </blockquote>
                </div><!-- End .testimonial -->

                <div class="testimonial">
                    <div class="testimonial-owner">
                        <figure>
                            <img src="{{ asset('assets/images/clients/client2.png') }}" alt="client">
                        </figure>

                        <div>
                            <strong class="testimonial-title">Tricia Chambers</strong>
                            <span>Atlanta, Georgia</span>
                        </div>
                    </div><!-- End .testimonial-owner -->

                    <blockquote>
                        <p>I ran across this site by accident when I needed to sell some gift cards fast and chatted with Theresa for a bit before researching the sites reputation.
                            I was a little leery at first, but Theresa made me feel so safe and followed through with every action promised.
                            I sold $20 in Walmart gift credit and got paid faster than any other gift card exchange I know of.
                            I will only be using <strong>CardsTrade</strong> from now on. I love this company and only wish I had known about them before now.
                            Excellent service and competitive trading rates…what more can I ask for? Join me now in patronizing this business and you too will be amazed at how happy and blessed you will feel afterwards.</p>
                    </blockquote>
                </div><!-- End .testimonial -->

                <div class="testimonial">
                    <div class="testimonial-owner">
                        <figure>
                            <img src="{{ asset('assets/images/clients/client1.png') }}" alt="client">
                        </figure>

                        <div>
                            <strong class="testimonial-title">Alexander Soifer</strong>
                            <span>Los Angeles, California</span>
                        </div>
                    </div><!-- End .testimonial-owner -->

                    <blockquote>
                        <p>I’m based in LA and have sold multiple gift cards to quick cash. They process payments faster and I love the humanized vibe of the company.
                            I’ve sold to various gift card companies and the past and will always choose QuickcashMI now..</p>
                    </blockquote>
                </div><!-- End .testimonial -->

                <div class="testimonial">
                    <div class="testimonial-owner">
                        <figure>
                            <img src="{{ asset('assets/images/clients/client1.png') }}" alt="client">
                        </figure>

                        <div>
                            <strong class="testimonial-title">John Bartlett</strong>
                            <span>Phoenix, Arizona</span>
                        </div>
                    </div><!-- End .testimonial-owner -->

                    <blockquote>
                        <p>I have no complaint. I sold them my cards and got my cash. They offered more money than any other site. They bought my cards when no one else would.</p>
                    </blockquote>
                </div>
            </div><!-- End .testimonials-slider -->
        </div><!-- End .container -->
    </div>

    <div class="counters-section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-4 count-container">
                    <div class="count-wrapper">
                        <span class="count-to" data-from="0" data-to="200" data-speed="2000"
                            data-refresh-interval="50">200</span>+
                    </div>
                    <h4 class="count-title">MILLION CUSTOMERS</h4>
                </div>
                <div class="col-6 col-md-4 count-container">
                    <div class="count-wrapper">
                        <span class="count-to" data-from="0" data-to="1800" data-speed="2000"
                            data-refresh-interval="50">1800</span>+
                    </div>
                    <h4 class="count-title">TEAM MEMBERS</h4>
                </div>
                <div class="col-6 col-md-4 count-container">
                    <div class="count-wrapper line-height-1">
                        <span class="count-to" data-from="0" data-to="24" data-speed="2000"
                            data-refresh-interval="50">24</span><span>HR</span>
                    </div>
                    <h4 class="count-title">SUPPORT AVAILABLE</h4>
                </div>
                <div class="col-6 col-md-4 count-container">
                    <div class="count-wrapper">
                        <span class="count-to" data-from="0" data-to="265" data-speed="2000"
                            data-refresh-interval="50">265</span>+
                    </div>
                    <h4 class="count-title">SUPPORT AVAILABLE</h4>
                </div>
                <div class="col-6 col-md-4 count-container">
                    <div class="count-wrapper line-height-1">
                        <span class="count-to" data-from="0" data-to="99" data-speed="2000"
                            data-refresh-interval="50">99</span><span>%</span>
                    </div>
                    <h4 class="count-title">SUPPORT AVAILABLE</h4>
                </div>
            </div>
        </div>
    </div>

@endsection
