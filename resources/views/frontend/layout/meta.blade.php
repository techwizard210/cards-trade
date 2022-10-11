<!-- WebFont.js -->
<script>
    WebFontConfig = {
        google: { families: ['Poppins:400,500,600,700'] }
    };
    (function (d) {
        var wf = d.createElement('script'), s = d.scripts[0];
        wf.src = '{{ asset('user-assets/js/webfont.js') }}';
        wf.async = true;
        s.parentNode.insertBefore(wf, s);
    })(document);
</script>

<link rel="preload" href="{{ asset('user-assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2') }}" as="font" type="font/woff2"
    crossorigin="anonymous">
<link rel="preload" href="{{ asset('user-assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2') }}" as="font" type="font/woff2"
    crossorigin="anonymous">
<link rel="preload" href="{{ asset('user-assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2') }}" as="font" type="font/woff2"
        crossorigin="anonymous">
<link rel="preload" href="{{ asset('user-assets/fonts/wolmart87d5.woff?png09e') }}" as="font" type="font/woff" crossorigin="anonymous">

<!-- Vendor CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('user-assets/vendor/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('user-assets/vendor/animate/animate.min.css') }}">

<!-- Plugins CSS -->
<link rel="stylesheet" href="{{ asset('user-assets/vendor/swiper/swiper-bundle.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('user-assets/vendor/nouislider/nouislider.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('user-assets/vendor/magnific-popup/magnific-popup.min.css') }}">

<!-- Default CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('user-assets/css/style.min.css') }}">
