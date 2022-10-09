<footer class="footer bg-black position-relative">
    <div class="footer-middle">
        <div class="container position-static">
            <div class="row">
                <div class="col-lg-5 m-b-4">
                    <a href="{{ URL::to('/') }}">
                        <img src="{{ asset('assets/images/logo-footer.png') }}" alt="{{ Helper::getCommonSetting('company_logo_name') }}" width="240" height="42">
                    </a>
                    <p class="my-2">{{ __('message.home.footer_intro') }}</p>
                    <div class="row ls-0 mt-2">
                        <div class="col-sm-6">
                            <h6 class="text-uppercase text-white mb-1">{{ __('message.home.questions') }}?</h6>
                            <h3 class="text-primary">{{ Helper::getCommonSetting('company_contact_phone') }}</h3>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons">
                                <a href="{{ Helper::getCommonSetting('social_facebook') }}" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                                <a href="{{ Helper::getCommonSetting('social_twitter') }}" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                                <a href="{{ Helper::getCommonSetting('social_instagram') }}" class="social-icon social-instagram icon-instagram" target="_blank" title="Instagram"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 m-b-4">
                    <div class="widget">
                        <h4 class="widget-title">{{ __('title.customer_service') }}</h4>
                        <ul class="links">
                            <li>
                                <a href="{{ route('my-account', app()->getLocale()) }}">{{ __('label.my_account') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('order.track', app()->getLocale()) }}">{{ __('title.track_order') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('payment-methods', app()->getLocale()) }}">{{ __('title.payment_methods') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('shipping-guide', app()->getLocale()) }}">{{ __('title.shipping_guide') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('faq', app()->getLocale()) }}">FAQs</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 m-b-4">
                    <div class="widget">
                        <h4 class="widget-title">{{ __('title.about_us') }}</h4>
                        <ul class="links">
                            <li>
                                <a href="{{ route('about-us', app()->getLocale()) }}">{{ __('title.about_us') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('contact-us', app()->getLocale()) }}">{{ __('title.contact_us') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('terms', app()->getLocale()) }}">{{ __('title.terms_and_conditions') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('privacy-policy', app()->getLocale()) }}">{{ __('title.privacy_policy') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('return-policy', app()->getLocale()) }}">{{ __('title.return_policy') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 m-b-4">
                    <div class="widget">
                        <h4 class="widget-title">{{ __('label.partner_optician') }}</h4>
                        <ul class="links">
                            @foreach (Helper::getPartnerList() as $list)
                            <li>
                                <a href="{{ $list->url }}" target="_blank">{{ $list->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="footer-bottom d-sm-flex align-items-center bg-black">
            <div class="footer-left">
                <span class="footer-copyright">Copyright &copy; 2020-{{ date('Y') }} {{ Helper::getCommonSetting('company_logo_name') }}. {{ __('message.all_right_reserved') }}</span>
            </div>
            <div class="footer-right ml-auto mt-1 mt-sm-0">
                <div class="payment-icons">
                    <span class="payment-icon visa" style="background-image: url({{ asset('assets/images/payments/payment-visa.svg') }})"></span>
                    <span class="payment-icon paypal" style="background-image: url({{ asset('assets/images/payments/payment-paypal.svg') }})"></span>
                    <span class="payment-icon stripe" style="background-image: url({{ asset('assets/images/payments/payment-stripe.png') }})"></span>
                    <span class="payment-icon verisign" style="background-image:  url({{ asset('assets/images/payments/payment-verisign.svg') }})"></span>
                </div>
            </div>
        </div>
    </div>
</footer>
