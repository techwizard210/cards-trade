<div class="newsletter-popup mfp-hide bg-img" id="newsletter-popup-form" style="background: #f1f1f1 no-repeat center/cover url({{ asset('assets/images/newsletter_popup_bg.jpg') }})">
    <div class="newsletter-popup-content">
        <img src="{{ asset('assets/images/logo-black.png') }}" alt="{{ Helper::getCommonSetting('company_logo_name') }}" class="logo-newsletter" width="200" height="84">
        <h2>{{ __('message.subscribe_newsletter_title') }}</h2>
        <p>
            {{ __('message.newsletter_msg_2') }}
        </p>
        <form action="#" class="newsletter-form" id="form-subscribe-popup">
            <div class="input-group">
                <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="{{ __('label.your_email_address') }}" required />
                <input class="btn btn-primary" id="btn-submit-popup" value="{{ __('title.buttons.subscribe') }}" />
            </div>
        </form>
        <div class="newsletter-subscribe">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" value="0" id="show-again" />
                <label for="show-again" class="custom-control-label">
                    {{ __('message.dont_show_message_again') }}
                </label>
            </div>
        </div>
    </div>
    <button title="Close (Esc)" type="button" class="mfp-close">×</button>
</div>
