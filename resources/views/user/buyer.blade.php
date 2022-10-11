@extends('user.layout.app')

@section('content')

<div class="container">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="demo42.html"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">SHOP</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-9 main-content">
            <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                <div class="toolbox-left">
                    <a href="#" class="sidebar-toggle">
                        <svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                            <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                            <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                            <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                            <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                            <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                            <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                            <path
                                d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                class="cls-2"></path>
                            <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                            <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                            <path
                                d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                class="cls-2"></path>
                        </svg>
                        <span>Filter</span>
                    </a>

                    <div class="toolbox-item toolbox-sort">
                        <label class="text-uppercase">{{ __('label.sort_by') }}:</label>
                        <div class="select-custom">
                            <select name="orderby" class="form-control sort-selector">
                                <option value="" selected="selected">{{ __('label.default') }}</option>
                                {{-- <option value="popularity">Sort by popularity</option>
                                <option value="rating">Sort by average rating</option> --}}
                                <option value="new" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='new') selected @endif>{{ __('label.new') }}</option>
                                <option value="title" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='title') selected @endif>{{ __('label.name') }} (A-Z)</option>
                                <option value="price" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='price') selected @endif>{{ __('label.price') }}: {{ __('label.ascending') }}</option>
                                <option value="price-desc" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='price-desc') selected @endif>{{ __('label.price') }}: {{ __('label.descending') }}</option>
                            </select>
                        </div>
                        <!-- End .select-custom -->


                    </div>
                    <!-- End .toolbox-item -->
                </div>
                <!-- End .toolbox-left -->

                <div class="toolbox-right">

                    <div class="toolbox-item toolbox-show">
                        <label class="text-uppercase">{{ __('label.show') }}:</label>
                        <div class="select-custom">
                            <select class="form-control" id="page-size-selector">
                                <option value="12" @if(!empty($_GET['show']) && $_GET['show']=='12') selected @endif>12</option>
                                <option value="24" @if(!empty($_GET['show']) && $_GET['show']=='24') selected @endif>24</option>
                                <option value="36" @if(!empty($_GET['show']) && $_GET['show']=='36') selected @endif>36</option>
                            </select>
                        </div>
                        <!-- End .select-custom -->
                    </div>
                    <!-- End .toolbox-item -->

                    <div class="toolbox-item layout-modes">
                        <a href="javascript:;" class="layout-btn btn-grid active" title="{{ __('label.grid') }}">
                            <i class="icon-mode-grid"></i>
                        </a>
                        <a href="javascript:;" class="layout-btn btn-list" title="{{ __('label.list') }}">
                            <i class="icon-mode-list"></i>
                        </a>
                    </div>
                    <!-- End .layout-modes -->
                </div>
                <!-- End .toolbox-right -->
            </nav>

            <div class="row" style="display: none;" id="div-list">
                @forelse($products as $product)
                <div class="col-sm-12 col-6 product-default left-details product-list mb-2">
                    @include('user.components.product-div-list')
                </div>
                @empty
                <h4 class="text-products" style="margin:60px auto;">{{ __('message.home.no_product') }}</h4>
                @endforelse

            </div>
            <div class="row" id="div-grid">

                @forelse($products as $product)
                <div class="col-6 col-sm-4">
                    @include('user.components.product-div')
                </div>
                @empty
                <h4 class="text-products" style="margin:60px auto;">{{ __('message.home.no_product') }}</h4>
                @endforelse
            </div>

            @if(count($products)>0)
            <nav class="toolbox toolbox-pagination">
                <div class="toolbox-item toolbox-show">
                    <label class="text-uppercase">{{ __('label.show') }}:</label>
                    <div class="select-custom">
                        <select name="count" class="form-control" id="page-size-selector-bt">
                            <option value="12" @if(!empty($_GET['show']) && $_GET['show']=='12') selected @endif>12</option>
                            <option value="24" @if(!empty($_GET['show']) && $_GET['show']=='24') selected @endif>24</option>
                            <option value="36" @if(!empty($_GET['show']) && $_GET['show']=='36') selected @endif>36</option>
                        </select>
                    </div>
                </div>
                {{ $products->appends($_GET)->links() }}
            </nav>
            @endif

        </div>
        <!-- End .col-lg-9 -->

        <div class="sidebar-overlay"></div>
        <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
            <div class="sidebar-wrapper">
                <div class="widget">
                    <h3 class="widget-title">
                        <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true" aria-controls="widget-body-2">{{ __('title.categories') }}</a>
                    </h3>
                    <div class="collapse show" id="widget-body-2">
                        <div class="widget-body">
                            <ul class="cat-list">
                                <li class="{{ empty($_GET['cat'])||$_GET['cat']=='all'?'active':'' }}"><a href="?cat=all">{{ __('label.all_categories') }}</a><span class="products-count"></span></li>

                            </ul>
                        </div>
                        <!-- End .widget-body -->
                    </div>
                    <!-- End .collapse -->
                </div>
                <!-- End .widget -->

                <!-- Start .price range widget -->
                <div class="widget">
                    <h3 class="widget-title">
                        <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true" aria-controls="widget-body-3">{{ __('label.price') }}</a>
                    </h3>
                    <div class="collapse show" id="widget-body-3">
                        <div class="widget-body pb-0">
                            <form action="#" id="form-price-filter">
                                <div class="price-slider-wrapper">
                                    <div id="price-slider"></div>
                                </div>
                                <div class="filter-price-action d-flex align-items-center justify-content-between flex-wrap">
                                    <div class="filter-price-text">
                                        {{ __('label.price') }}:
                                        <span id="filter-price-range">
                                            $<span id="filter-price-from">{{ !empty($_GET['price'])? explode('-', $_GET['price'])[0] : 0 }}</span> -
                                            $<span id="filter-price-to">{{ !empty($_GET['price'])? explode('-', $_GET['price'])[1] : 100 }}</span>
                                        </span>
                                    </div>
                                    <button type="submit" class="btn btn-primary">{{ __('title.buttons.filter') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End .price range widget -->

                {{-- <div class="widget widget-color">
                    <h3 class="widget-title">
                        <a data-toggle="collapse" href="#widget-body-4" role="button" aria-expanded="true" aria-controls="widget-body-4">Color</a>
                    </h3>

                    <div class="collapse show" id="widget-body-4">
                        <div class="widget-body pb-0">
                            <ul class="config-swatch-list">
                                <li class="active">
                                    <a href="#" style="background-color: #000;"></a>
                                </li>
                                <li>
                                    <a href="#" style="background-color: #0188cc;"></a>
                                </li>
                                <li>
                                    <a href="#" style="background-color: #81d742;"></a>
                                </li>
                                <li>
                                    <a href="#" style="background-color: #6085a5;"></a>
                                </li>
                                <li>
                                    <a href="#" style="background-color: #ab6e6e;"></a>
                                </li>
                            </ul>
                        </div>
                        <!-- End .widget-body -->
                    </div>
                    <!-- End .collapse -->
                </div>
                <!-- End .widget -->

                <div class="widget widget-size">
                    <h3 class="widget-title">
                        <a data-toggle="collapse" href="#widget-body-5" role="button" aria-expanded="true" aria-controls="widget-body-5">Sizes</a>
                    </h3>

                    <div class="collapse show" id="widget-body-5">
                        <div class="widget-body pb-0">
                            <ul class="config-size-list">
                                <li class="active"><a href="#">XL</a></li>
                                <li><a href="#">L</a></li>
                                <li><a href="#">M</a></li>
                                <li><a href="#">S</a></li>
                            </ul>
                        </div>
                        <!-- End .widget-body -->
                    </div>
                    <!-- End .collapse -->
                </div>
                <!-- End .widget --> --}}
            </div>
            <!-- End .sidebar-wrapper -->
        </aside>
        <!-- End .col-lg-3 -->
    </div>
</div>

@endsection

@push('page-scripts')

<script type="text/javascript">

    $(document).ready(function (){

        var updateURL = function(key, value){
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            (urlParams.has(key) ? urlParams.set(key, value) : urlParams.append(key, value));
            window.location.search = urlParams.toString();
            //window.history.replaceState({}, '', `${location.pathname}?${urlParams}`);
        };


        $('.btn-list').on('click', function(){
            $('#div-grid').hide();
            $('#div-list').show();
            $(this).addClass('active');
            $('.btn-grid').removeClass('active');
        });

        $('.btn-grid').on('click', function(){
            $('#div-grid').show();
            $('#div-list').hide();
            $(this).addClass('active');
            $('.btn-list').removeClass('active');

        });

        $('#page-size-selector').on('change', function(){
            updateURL('show', $(this).val());
        });

        $('#page-size-selector-bt').on('change', function(){
            updateURL('show', $(this).val());
        });

        $('.sort-selector').on('change', function(){
            updateURL('sortBy', $(this).val());
        });

        $('.brand-select').on('change', function(){
            var str = '';
            $( ".brand-select" ).each(function( index ) {
                if($( this ).is(':checked')) str += ',' + $( this ).val();
            });
            updateURL('brand', str.substring(1));
        });

        $('#form-price-filter').on('submit', function (e) {
            e.preventDefault();
            updateURL('price', $('#filter-price-from').text() + '-' + $('#filter-price-to').text());
        });

    });

</script>

@endpush


