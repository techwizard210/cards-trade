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
            <div class="container">
                <!-- Start of Shop Content -->
                <div class="shop-content row gutter-lg mb-10">
                    <!-- Start of Sidebar, Shop Sidebar -->
                    <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
                        <!-- Start of Sidebar Overlay -->
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                        <!-- Start of Sidebar Content -->
                        <div class="sidebar-content scrollable">
                            <!-- Start of Sticky Sidebar -->
                            <div class="sticky-sidebar">
                                <div class="filter-actions">
                                    <label></label>
                                </div>
                                <!-- Start of Collapsible widget -->
                                <div class="widget widget-collapsible">
                                    <p class="side-title">Sell</p>
                                    <div class="select-custom">
                                        <select class="form-control" style="padding-left: 0" name="cardId" id="reCardId">
                                            @foreach ($merchants as $merchant)
                                                <option value="{{ $merchant->id }}">{{ $merchant->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <p class="side-title">Get paid via</p>
                                    <div class="select-custom">
                                        <select class="form-control mb-0" style="padding-left: 0"
                                            id="seller-merchant-select" name="gatewayId">
                                            @foreach ($gateways as $gateway)
                                                <option value={{ $gateway->id - 1 }}>{{ $gateway->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <p class="side-title">I Want To Get</p>
                                    <div class="select-custom">
                                        <input id="rePrice" type="number" class="form-control form-control-md"
                                            placeholder="$ balance" name="price" required>
                                    </div>
                                    <button class="btn btn-dark btn-rounded" style="margin-top: 30px;margin-left: 40px"
                                        type="submit" id="re-find">Find
                                        Offer<i class="w-icon-long-arrow-right"></i></button>
                                </div>
                                <!-- End of Collapsible Widget -->
                            </div>
                            <!-- End of Sidebar Content -->
                        </div>
                        <!-- End of Sidebar Content -->
                    </aside>
                    <!-- End of Shop Sidebar -->

                    <!-- Start of Shop Main Content -->
                    <div class="main-content">
                        <nav class="toolbox sticky-toolbox sticky-content fix-top" style="margin-top: 30px">
                            <div class="toolbox-left">
                                <a href="#"
                                    class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle
                                btn-icon-left d-block d-lg-none"><i
                                        class="w-icon-category"></i><span>Filters</span></a>
                            </div>
                            <div class="toolbox-item toolbox-sort select-box text-dark">
                                <label>Sort By :</label>
                                <select name="orderby" class="form-control sort-selector">
                                    <option value="" selected="selected">Default sorting</option>
                                    <option value="new" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'new') selected @endif>Sort by latest
                                    </option>
                                    <option value="title" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'title') selected @endif>Sort by Name
                                        (A-Z)</option>
                                    <option value="price" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'price') selected @endif>Sort by pric:
                                        low to high</option>
                                    <option value="price-desc" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'price-desc') selected @endif>Sort by
                                        price: high to low</option>
                                </select>
                            </div>
                            <div class="toolbox-right">
                                <div class="toolbox-item toolbox-layout">
                                    {{-- <a href="shop-list.html" class="icon-mode-list btn-layout">
                                        <i class="w-icon-list"></i>
                                    </a> --}}
                                </div>
                                <button id="getMoreBtn" class="btn btn-dark btn-rounded whiteBtn"
                                    data_cardid={{ $selectId }} data_price={{ $price }} data_index=0
                                    data_count={{ $offerCount }}>Get More</button>
                            </div>
                        </nav>
                        <div class="display-div">
                            <div class="d-flex offer-head">
                                <div style="flex: 30%">Username</div>
                                <div style="flex: 39%">Get paid with</div>
                                <div style="flex: 21%">Amount</div>
                                <div style="flex: 10%">Sell</div>
                            </div>
                        </div>
                        <div id="offersList">
                            @if (count($offers) > 0)
                                @foreach ($offers as $offer)
                                    <div class="d-flex offer-card align-items-center">
                                        <div class="d-flex flex-column first-item">
                                            <span style="color: #fb6a25">{{ $offer->username }}</span>
                                            <div class="d-flex align-items-center"
                                                style="margin-top: 10px; margin-bottom: 20px"><svg width="20"
                                                    height="20" stroke="currentColor" viewBox="0 0 16 16" fill="none"
                                                    class="icon-16 mr-1 text-success">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                        d="M4.952 6.768l2.774-3.62A1.317 1.317 0 019.79 3.11c.199.244.305.548.305.869V6.47h2.36c.456 0 .883.229 1.134.602l.244.374c.221.335.29.754.175 1.135l-1.036 3.596c-.175.587-.708.99-1.318.99H6.857c-.38 0-.747-.16-1.006-.441l-.899-1.06m-.804 1.524H2.709a.805.805 0 01-.804-.807v-5.63c0-.45.358-.808.804-.808h1.439c.442 0 .804.358.804.8v5.623c0 .441-.365.822-.804.822z">
                                                    </path>
                                                </svg>
                                                <span style="margin-left: 10px">1</span>
                                            </div>
                                            <div class="d-flex align-items-center" style="padding: auto 0"><svg
                                                    height="10" width="10">
                                                    <circle cx="5" cy="5" r="5" fill="#2d9f1f" />
                                                </svg>
                                                <span style="margin-left: 10px">online</span>
                                            </div>
                                        </div>
                                        <div class="d-flex small-container align-items-center justify-content-between">
                                            <div class="second-item">
                                                <img style="height: 80%; background-position: center;background-repeat: no-repeat; background-size: cover;"
                                                    src="images/{{ $offer->gateway }}.png" />
                                                {{-- {{ $gateways[$offer->gateway] }} --}}
                                            </div>
                                            <div class="font-weight-bold third-item">
                                                {{ ($offer->price * $price) / 100 }} USD</div>
                                            <div class="fourth-item"><a
                                                    href={{ route('gateway') . '?offerId=' . $offer->id }}><button
                                                        class="btn btn-dark btn-rounded blueBtn">sell</button></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div style="border: 1px solid #d8d8d8; border-top: none;">
                                    <h2 class="text-center no-record">No Records Found.</h2>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- End of Shop Main Content -->
                </div>
                <!-- End of Shop Content -->
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
@endsection

@push('page-script')
    <script type="text/javascript">
        $(document).ready(function() {

            var updateURL = function(key, value) {
                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                (urlParams.has(key) ? urlParams.set(key, value) : urlParams.append(key, value));
                window.location.search = urlParams.toString();
                //window.history.replaceState({}, '', `${location.pathname}?${urlParams}`);
            };


            $('.btn-list').on('click', function() {
                $('#div-grid').hide();
                $('#div-list').show();
                $(this).addClass('active');
                $('.btn-grid').removeClass('active');
            });

            $('.btn-grid').on('click', function() {
                $('#div-grid').show();
                $('#div-list').hide();
                $(this).addClass('active');
                $('.btn-list').removeClass('active');

            });

            $('#page-size-selector').on('change', function() {
                updateURL('show', $(this).val());
            });

            $('#page-size-selector-bt').on('change', function() {
                updateURL('show', $(this).val());
            });

            $('.sort-selector').on('change', function() {
                updateURL('sortBy', $(this).val());
            });

            $('.category-selector').on('click', function() {
                updateURL('cat', $(this).attr('data-id'));
            });

            $('#form-price-filter').on('submit', function(e) {
                e.preventDefault();
                updateURL('price', $('#filter-price-from').text() + '-' + $('#filter-price-to').text());
            });

        });
    </script>
@endpush
