<script>var HOST_URL = "{{ route('home') }}";</script>
<!-- Plugin JS File -->
<script src="{{ asset('user-assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('user-assets/vendor/jquery.validate/jquery.validate.min.js') }}"></script>
<script src="{{ asset('user-assets/vendor/sticky/sticky.js') }}"></script>
<script src="{{ asset('user-assets/vendor/jquery.plugin/jquery.plugin.min.js') }}"></script>
<script src="{{ asset('user-assets/vendor/jquery.count-to/jquery.count-to.min.js') }}"></script>
<script src="{{ asset('user-assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('user-assets/vendor/nouislider/nouislider.min.js') }}"></script>
<script src="{{ asset('user-assets/vendor/jquery.countdown/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('user-assets/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
<script src="{{ asset('user-assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('user-assets/vendor/parallax/parallax.min.js') }}"></script>
<script src="{{ asset('user-assets/vendor/zoom/jquery.zoom.js') }}"></script>
<script src="{{ asset('user-assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('user-assets/vendor/toastr/toastr.min.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('user-assets/js/main.min.js') }}"></script>

@stack('page-script')

<script type="text/javascript">
    $(document).ready(function (){
        $(document).on('click', '.btn-remove-item-cart', function(e){
            e.preventDefault();
            var i = $(this);
            $.ajax({
                type: "POST",
                url: "{{ route('cart.remove') }}",
                data: {
                    product_id: i.attr('data-id')
                },
                headers: {
                    'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')
                },
                success: function (response) {
                    if(response.status == 'error') {
                        toastr['error'](response.message);
                    }
                    else if(response.status == 'success'){
                        toastr['success'](response.message);
                        $('.cart-count').html(response.cnt), $('#side-cart-subtotal').html('$' + response.subtotal);
                        i.closest(".product.product-cart").remove();
                    } else {
                        toastr['warning']('Something went wrong, please try again.');
                    }
                },
                error: function(response) {
                    toastr['error']('Server Connection Failed');
                }
            });
        });
    });
</script>
