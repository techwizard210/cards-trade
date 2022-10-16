@extends('frontend.layout.app')

@section('content')

<main class="main about-us">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">About Us</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav mb-10 pb-8">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content">
        <div class="container">
            <section class="introduce mb-10 pb-10">
                <h2 class="title title-center">
                    We’re Fast Growing <br>Gift Cards Exchange Platform
                </h2>
                <p class=" mx-auto text-center">We are a Michigan based company. We understand that superior customer service is our only competitive advantage and we strive to be the best in our areas of expertise.</p>
                <figure class="br-lg">
                    <img src="{{ asset('user-assets/images/pages/about_us/1.jpg') }}" alt="Banner"
                        width="1240" height="540" style="background-color: #D0C1AE;" />
                </figure>
            </section>

            <section class="customer-service mb-7">
                <div class="row align-items-center">
                    <div class="col-md-6 pr-lg-8 mb-8">
                        <h2 class="title text-left">We Provide Continuous &amp; Kind Service for Customers</h2>
                        <div class="accordion accordion-simple accordion-plus">
                            <div class="card border-no">
                                <div class="card-header">
                                    <a href="#collapse3-1" class="collapse">Customer Selling Cards Service</a>
                                </div>
                                <div class="card-body expanded" id="collapse3-1">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit eiusamet, consectetur adipiscing elit,
                                        sed do eius mod tempor incididunt ut labore
                                        et dolore magna aliqua. Venenatis tell
                                        us in metus vulputate eu scelerisque felis. Vel pretium vulp.
                                    </p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <a href="#collapse3-2" class="expand">Customer Buying Cards Service</a>
                                </div>
                                <div class="card-body collapsed" id="collapse3-2">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit eiusamet, consectetur adipiscing elit,
                                        sed do eius mod tempor incididunt ut labore
                                        et dolore magna aliqua. Venenatis tell
                                        us in metus vulputate eu scelerisque felis. Vel pretium vulp.
                                    </p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <a href="#collapse3-3" class="expand">Card Exchange Service</a>
                                </div>
                                <div class="card-body collapsed" id="collapse3-3">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit eiusamet, consectetur adipiscing elit,
                                        sed do eius mod tempor incididunt ut labore
                                        et dolore magna aliqua. Venenatis tell
                                        us in metus vulputate eu scelerisque felis. Vel pretium vulp.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-8">
                        <figure class="br-lg">
                            <img src="{{ asset('user-assets/images/pages/about_us/2.jpg') }}" alt="Banner"
                                width="610" height="500" style="background-color: #CECECC;" />
                        </figure>
                    </div>
                </div>
            </section>

            <section class="count-section mb-10 pb-5">
                <div class="swiper-container swiper-theme" data-swiper-options="{
                    'slidesPerView': 1,
                    'breakpoints': {
                        '768': {
                            'slidesPerView': 2
                        },
                        '992': {
                            'slidesPerView': 3
                        }
                    }
                }">
                    <div class="swiper-wrapper row cols-lg-3 cols-md-2 cols-1">
                        <div class="swiper-slide counter-wrap">
                            <div class="counter text-center">
                                <span class="count-to" data-to="15">0</span>
                                <span>M+</span>
                                <h4 class="title title-center">Cards For Sale</h4>
                                <p>Diam maecenas ultricies mi eget mauris<br>
                                    Nibh tellus molestie nunc non</p>
                            </div>
                        </div>
                        <div class="swiper-slide counter-wrap">
                            <div class="counter text-center">
                                <span>$</span>
                                <span class="count-to" data-to="25">0</span>
                                <span>B+</span>
                                <h4 class="title title-center">Marketing Sales</h4>
                                <p>Diam maecenas ultricies mi eget mauris<br>
                                    Nibh tellus molestie nunc non</p>
                            </div>
                        </div>
                        <div class="swiper-slide counter-wrap">
                            <div class="counter text-center">
                                <span class="count-to" data-to="100">0</span>
                                <span>M+</span>
                                <h4 class="title title-center">Growing Buyers</h4>
                                <p>Diam maecenas ultricies mi eget mauris<br>
                                    Nibh tellus molestie nunc non</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>
        </div>

        <section class="boost-section pt-10 pb-10">
            <div class="container mt-10 mb-9">
                <div class="row align-items-center mb-10">
                    <div class="col-md-6 mb-8">
                        <figure class="br-lg">
                            <img src="{{ asset('user-assets/images/pages/about_us/3.jpg') }}" alt="Banner"
                                width="610" height="450" style="background-color: #9E9DA2;" />
                        </figure>
                    </div>
                    <div class="col-md-6 pl-lg-8 mb-8">
                        <h4 class="title text-left">WHAT WE DO</h4>
                        <p class="mb-6">In 2011, we began buying and selling gift cards online and in mail. Our goal is to offer a simple, safe, and convenient way to buy and sell gift cards. Hence, we offer a Warranty with each gift card purchase and strive to complete our transaction with you with integrity. Also, we are a small, Chelsea, Michigan-based company that has been in business since 2011. We have lived in Michigan for over 40 years and are committed to our community.</p>
                        <a href="{{ route('buy') }}" class="btn btn-dark btn-rounded">VISIT STORE</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="customer-review parallax slider-section"
            data-parallax-options="{'speed': 10, 'parallaxHeight': '200%', 'offset': 0}"
            data-image-src="{{ asset('user-assets/images/banner.jpg') }}">
            <div class="container">
                <h2 class="title title-center mb-5 mt-10 text-white" style="font-size: 32px;">What Customers Say</h2>
                <div class="row">
                    <div class="col-lg-2 col-md-2"></div>
                    <div class="col-lg-8 col-md-8 mb-4 mb-md-0">
                        <div class="swiper-container swiper-theme pg-right show-code-action"
                            data-swiper-options="{
                            'slidesPerView': 1,
                            'spaceBetween': 20
                        }">
                            <div class="swiper-wrapper row cols-1">
                                <div class="swiper-slide testimonial testimonial-blockquote">
                                    <blockquote>
                                        This company is amazing! I was skeptical at first; however my check came quickly.
                            In fact, my favorite part was that when I had a question about the process someone on the online chat quickly responded to me.
                            And when my check was ready to go out, I got a personal phone call confirming my address! Completely professional and so very friendly!
                            This is the site to use for your unwanted gift cards!!
                                    </blockquote>
                                    <div class="testimonial-info">
                                        <figure class="testimonial-author-thumbnail">
                                            <img src="{{ asset('user-assets/images/agents/1-100x100.png') }}" alt="Testimonial"
                                                width="70" height="70" />
                                        </figure>
                                        <cite>Alexandria Gandolfo<span>Fort Myers, Florida</span></cite>
                                    </div>
                                </div>
                                <div class="swiper-slide testimonial testimonial-blockquote">
                                    <blockquote>
                                        I ran across this site by accident when I needed to sell some gift cards fast and chatted with Theresa for a bit before researching the sites reputation.
                            I was a little leery at first, but Theresa made me feel so safe and followed through with every action promised.
                            I sold $20 in Walmart gift credit and got paid faster than any other gift card exchange I know of.
                            I will only be using <strong>CardsTrade</strong> from now on. I love this company and only wish I had known about them before now.
                            Excellent service and competitive trading rates…what more can I ask for? Join me now in patronizing this business and you too will be amazed at how happy and blessed you will feel afterwards.
                                    </blockquote>
                                    <div class="testimonial-info">
                                        <figure class="testimonial-author-thumbnail">
                                            <img src="{{ asset('user-assets/images/agents/2-100x100.png') }}" alt="Testimonial"
                                                width="70" height="70" />
                                        </figure>
                                        <cite>Tricia Chambers<span>Atlanta, Georgia</span></cite>
                                    </div>
                                </div>
                                <div class="swiper-slide testimonial testimonial-blockquote">
                                    <blockquote>
                                        I’m based in LA and have sold multiple gift cards to quick cash. They process payments faster and I love the humanized vibe of the company.
                            I’ve sold to various gift card companies and the past and will always choose QuickcashMI now..
                                    </blockquote>
                                    <div class="testimonial-info">
                                        <figure class="testimonial-author-thumbnail">
                                            <img src="{{ asset('user-assets/images/agents/3-100x100.png') }}" alt="Testimonial"
                                                width="70" height="70" />
                                        </figure>
                                        <cite>Alexander Soifer<span>Los Angeles, California</span></cite>
                                    </div>
                                </div>
                                <div class="swiper-slide testimonial testimonial-blockquote">
                                    <blockquote>
                                        I have no complaint. I sold them my cards and got my cash. They offered more money than any other site. They bought my cards when no one else would.
                                    </blockquote>
                                    <div class="testimonial-info">
                                        <figure class="testimonial-author-thumbnail">
                                            <img src="{{ asset('user-assets/images/agents/2-100x100.png') }}" alt="Testimonial"
                                                width="70" height="70" />
                                        </figure>
                                        <cite>John Bartlett<span>Phoenix, Arizona</span></cite>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2"></div>
                </div>
            </div>
        </section>

        <section class="member-section mt-10 pt-9 mb-10 pb-4">
            <div class="container">
                <h4 class="title title-center mb-3">Meet Our Team</h4>
                <p class="text-center mb-8">Nunc id cursus metus aliquam. Libero id faucibus nisl tincidunt eget. Aliquam<br>
                    maecenas ultricies mi eget mauris. Volutpat ac</p>
                <div class="swiper-container swiper-theme" data-swiper-options="{
                    'spaceBetween': 20,
                    'slidesPerView': 1,
                    'breakpoints': {
                        '576': {
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
                    <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-sm-2 cols-1">
                        <div class="swiper-slide member-wrap">
                            <figure class="br-lg">
                                <img src="{{ asset('user-assets/images/pages/about_us/4.jpg') }}" alt="Member" width="295" height="332" />
                                <div class="overlay">
                                    <div class="social-icons">
                                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                        <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                    </div>
                                </div>
                            </figure>
                            <div class="member-info text-center">
                                <h4 class="member-name">John Doe</h4>
                                <p class="text-uppercase">Founder &amp; CEO</p>
                            </div>
                        </div>
                        <div class="swiper-slide member-wrap">
                            <figure class="br-lg">
                                <img src="{{ asset('user-assets/images/pages/about_us/5.jpg') }}" alt="Member" width="295" height="332" />
                                <div class="overlay">
                                    <div class="social-icons">
                                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                        <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                    </div>
                                </div>
                            </figure>
                            <div class="member-info text-center">
                                <h4 class="member-name">Jessica Doe</h4>
                                <p class="text-uppercase">Marketing</p>
                            </div>
                        </div>
                        <div class="swiper-slide member-wrap">
                            <figure class="br-lg">
                                <img src="{{ asset('user-assets/images/pages/about_us/6.jpg') }}" alt="Member" width="295" height="332" />
                                <div class="overlay">
                                    <div class="social-icons">
                                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                        <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                    </div>
                                </div>
                            </figure>
                            <div class="member-info text-center">
                                <h4 class="member-name">Rick Edward Doe</h4>
                                <p class="text-uppercase">Developer</p>
                            </div>
                        </div>
                        <div class="swiper-slide member-wrap">
                            <figure class="br-lg">
                                <img src="{{ asset('user-assets/images/pages/about_us/7.jpg') }}" alt="Member" width="295" height="332" />
                                <div class="overlay">
                                    <div class="social-icons">
                                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                        <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                    </div>
                                </div>
                            </figure>
                            <div class="member-info text-center">
                                <h4 class="member-name">Melinda Wolosky</h4>
                                <p class="text-uppercase">Design</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
    </div>
</main>

@endsection
