<script>var HOST_URL = "{{ route('home', app()->getLocale()) }}";</script>
<script>var JSON_TITLE = @json( __('title') );</script>
<script>var JSON_MESSAGE = @json( __('message') );</script>

<!-- Plugins JS File -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/optional/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.cookie.js') }}" ></script>
<script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.plugin.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/nouislider.min.js') }}"></script>
<script src="{{ asset('assets/plugin/toastr/toastr.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

<!-- Main JS File -->
<script src="{{ asset('assets/js/main.min.js') }}"></script>

<script type="text/javascript">

    $(document).ready(function (){

        // Check if valid Email
        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }

        // Remove product from wishlist
        $('.btn-remove-wishlist').on('click', function (e){
            e.preventDefault();
            var i = $(this).closest(".product-row");
            $.ajax({
                type: "POST",
                url: "{{ route('wishlist-delete', app()->getLocale()) }}",
                data: {
                    product_id: $(this).attr('data-id'),
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
                        i.remove();
                    } else {
                        toastr['warning'](JSON_MESSAGE.response.something_wrong);
                    }
                },
                error: function(response) {
                    toastr['error'](JSON_MESSAGE.response.unknown_error);
                }
            });
        });

        // Remove product from cart
        $('.btn-remove-cart').on('click', function (e){
            e.preventDefault();
            var i = $(this).closest(".product-row");
            $.ajax({
                type: "POST",
                url: "{{ route('wishlist-delete', app()->getLocale()) }}",
                data: {
                    product_id: $(this).attr('data-id'),
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
                        i.remove();
                    } else {
                        toastr['warning'](JSON_MESSAGE.response.something_wrong);
                    }
                },
                error: function(response) {
                    toastr['error'](JSON_MESSAGE.response.unknown_error);
                }
            });
        });

        // Newsletter Validataion
        $('.btn-submit-newsletter').on('click', function (e) {
            e.preventDefault();
            var email = $('#subscriber_email').val();
            var i = $('#form-newsletter');
            if(email === '' || email === null) {
                i.addClass('error');
                return toastr['error']('{{ __('message.validation.required') }}');
            }
            if(isEmail(email)) {
                i.removeClass('error');
                $.ajax({
                    type: "POST",
                    url: "{{ route('subscribe', app()->getLocale()) }}",
                    data: {
                        email: email,
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
                            $('#subscriber_email').val('');
                        } else {
                            toastr['warning'](JSON_MESSAGE.response.something_wrong);
                        }
                    },
                    error: function(response) {
                        toastr['error'](JSON_MESSAGE.response.unknown_error);
                    }
                });
            } else {
                i.addClass('error');
                return toastr['error']('{{ __('message.validation.invalid_email') }}');
            }
        });

        // Popup Newsletter Validataion
        $('#btn-submit-popup').on('click', function (e) {
            e.preventDefault();
            var email = $('#newsletter-email').val();
            var i = $('#form-subscribe-popup');
            if(email === '' || email === null) {
                i.addClass('error');
                return toastr['error']('{{ __('message.validation.required') }}');
            }
            if(isEmail(email)) {
                i.removeClass('error');
                $.ajax({
                    type: "POST",
                    url: "{{ route('subscribe', app()->getLocale()) }}",
                    data: {
                        email: email,
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
                            $('#newsletter-email').val('');
                            $('#newsletter-popup-form').hide();
                        } else {
                            toastr['warning'](JSON_MESSAGE.response.something_wrong);
                        }
                    },
                    error: function(response) {
                        toastr['error'](JSON_MESSAGE.response.unknown_error);
                    }
                });
            } else {
                i.addClass('error');
                return toastr['error']('{{ __('message.validation.invalid_email') }}');
            }
        });

    });

</script>

<script type="text/javascript">

    !function(w,h,a,t,s,p){
        w.whatsapp || (
        s = h.createElement(a),
        s.src = t,
        p = h.getElementsByTagName(a)[0],
        p.parentNode.insertBefore(s, p)
    )}(window, document, "script", "{{ asset('assets/js/whatsapp.js') }}");
    window.addEventListener('load', function(){
        new whatsapp({
            title: "Elegance Whatsapp",
            description: "{{ __('message.chat_on_whatsapp') }}",
            agents:[{
                name: "Support Team",
                phone: "{{ Helper::getCommonSetting('company_whatsapp') }}",
                cta: "{{ __('message.click_to_start_chat') }}",
                // schedule: [
                //     ["9:00", "18:00"], //Sundays or Holidays
                //     ["9:00", "20:00"],
                //     ["9:00", "20:00"],
                //     ["9:00", "20:00"],
                //     ["9:00", "20:00"],
                //     ["9:00", "22:00"],
                //     ["10:00", "18:00"] // Saturday
                // ]
            }]
        })
    });

</script>

<!-- Trusted Shop Badge -->
<script
    async
    data-desktop-y-offset="10"
    data-mobile-y-offset="0"
    data-desktop-disable-reviews="false"
    data-desktop-enable-custom="false"
    data-desktop-position="left"
    data-desktop-custom-width="156"
    data-desktop-enable-fadeout="false"
    data-disable-mobile="false"
    data-disable-trustbadge="false"
    data-mobile-custom-width="156"
    data-mobile-disable-reviews="false"
    data-mobile-enable-custom="false"
    data-mobile-position="left"
    charset="UTF-8"
    src="//widgets.trustedshops.com/js/XEC3D29A027C9FF5C76D598AA9AE8746C.js">
</script>

<script type="text/javascript">
    const words = ["suppose end get","boy warrant general","natural. delightful","met sufficient projection ask.","decisively everything","principles if preference","do","impression","of. preserved oh so","difficult repulsive on","in household. in what","do","miss time be. valley","as be","appear","cannot so","by.","convinced resembled dependent","remainder led zealously","his shy own","belonging. always length","letter","adieus","add number moment she.","promise few","compass six several old","offices removal parties","fat. concluded","rapturous it intention","perfectly daughters","is as.","behaviour we","improving at something","to. evil true","high lady roof men","had open.","to projection considered it","precaution an","melancholy or.","wound young","you thing","worse along being ham.","dissimilar of favourable solicitude","if sympathize middletons","at. forfeited","up if disposing","perfectly in an","eagerness perceived necessary.","belonging sir","curiosity discovery","extremity yet","forfeited prevailed","own off.","travelling by","introduced of","mr terminated. knew as","miss","my high hope quit. in","curiosity shameless dependent","knowledge up.","literature admiration","frequently indulgence announcing","are who you","her. was","least quick after","six. so","it yourself repeated","together","cheerful. neither it cordial so","painful picture studied if.","sex","him position doubtful","resolved boy expenses.","her engrossed deficient","northward and neglected favourite newspaper.","but","use peculiar","produced concerns ten. maids","table how","learn","drift","but purse","stand yet","set. music me","house could","among oh","as their. piqued","our","sister shy nature almost","his","wicket.","hand dear","so we hour","to. he","we be","hastily","offence effects","he service. sympathize","it projection","ye insipidity celebrated"]

const containerEl = document.querySelector('.container')
const formEl = document.querySelector('#search')
const dropEl = document.querySelector('.drop')

    const formHandler = (e) => {
        const userInput = e.target.value.toLowerCase()

        if(userInput.length === 0) {
            dropEl.style.height = 0
            return dropEl.innerHTML = ''
        }

        // Remove product from wishlist

        $.ajax({
            type: "POST",
            url: "{{ route('search.getRecommended', app()->getLocale()) }}",
            data: {
                search: userInput
            },
            headers: {
                'X-CSRF-Token': $('meta[name=csrf_token]').attr('content')
            },
            success: function (response) {
                if(response.status == 'error') {
                    toastr['error'](response.message);
                }
                else if(response.status == 'success'){
                    dropEl.innerHTML = ''
                    response.data.forEach(item => {
                        const listEl = document.createElement('li');
                        var regEx = new RegExp(userInput, "ig");
                        var orgin_word = item.title.substr(item.title.search(regEx), userInput.length);
                        let pro_title = item.title.replace(regEx, '<span class="mark p-0">' + orgin_word + '</span>');
                        let tmp = '<a href="{{ route('home', app()->getLocale()) }}/product-detail/'+ item.slug+'" class="d-flex justify-content-start align-items-center list-recommend">\
                            <div class="img">';
                        if(!item.photo) tmp += '<img src="/assets/images/product-default.png" alt="' + item.title + '" width="40" height="40">';
                        else tmp += '<img src="/products/' + item.photo + '" alt="' + item.title + '" width="40" height="40">';

                        tmp += '</div>\
                                <div class="pro pl-4">\
                                    <p class="mb-0 name">' + pro_title + '</p>\
                                    <p class="tip">' + item.brand.title + ' | ' + item.cat_info.title + '</p>\
                                    </div>\
                                    <div class="text-right ml-5"><p class="pro-price">' + item.calc_price + ' </p></div>\
                                    </a>';



                        //listEl.textContent = item.title
                        listEl.innerHTML = tmp;
                        if(item === userInput) {
                            listEl.classList.add('match')
                        }
                        dropEl.appendChild(listEl)
                    })
                    if(response.counts > 8) {
                        const listEl = document.createElement('li');
                        listEl.innerHTML = '<a href="{{ route('products', app()->getLocale()).'?q=' }}' + userInput + '">Show more ' + (response.counts - 8) +' results</a>';
                        dropEl.appendChild(listEl);
                    }
                    if(dropEl.children[0] === undefined) {
                        return dropEl.style.height = 0
                    }

                    let totalChildrenHeight = dropEl.children[0].offsetHeight * response.data.length;
                    if(response.counts > 8) totalChildrenHeight += 40;
                    dropEl.style.height = totalChildrenHeight + 'px'
                } else {
                    toastr['warning'](JSON_MESSAGE.response.something_wrong);
                }
            },
            error: function(response) {
                toastr['error'](JSON_MESSAGE.response.unknown_error);
            }
        });


        // const filteredWords = words.filter(word => word.toLowerCase().includes(userInput)).sort().splice(0, 5)

        // dropEl.innerHTML = ''
        // filteredWords.forEach(item => {
        //     const listEl = document.createElement('li')
        //     listEl.textContent = item
        //     if(item === userInput) {
        //         listEl.classList.add('match')
        //     }
        //     dropEl.appendChild(listEl)
        // })

    }

    formEl.addEventListener('input', formHandler)
</script>

