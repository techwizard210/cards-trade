@extends('backend.layout.app')

@push('page-title')

    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">{{ __('title.new_product') }}</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">{{ __('title.home') }}</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('admin.product.index') }}" class="text-muted text-hover-primary">{{ __('title.products') }}</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-dark">{{ __('title.new_product') }}</li>
    </ul>

@endpush

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <input id="product-id" hidden>
            <!--begin::Form-->
            <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row gap-7 gap-lg-10" data-kt-redirect="{{ route('admin.product.index') }}">
                @csrf
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px min-w-300px">
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __('label.thumbnail') }}</h2>
                            </div>
                        </div>
                        <div class="card-body text-center pt-0">
                            <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true" style="background-image: url({{ asset('admin-assets/media/svg/files/blank-image.svg') }})">
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <input type="file" name="product_image" id="product_image" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                </label>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                            </div>
                            <div class="text-muted fs-7">{{ __('message.admin.thumb_notice') }}</div>
                        </div>
                    </div>
                    <!--end::Thumbnail settings-->
                    <!--begin::Status-->
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __('label.status') }}</h2>
                            </div>
                            <div class="card-toolbar">
                                <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <select name="status" class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="kt_ecommerce_add_product_status_select">
                                <option></option>
                                <option value="active" selected="selected">{{ __('label.active') }}</option>
                                <option value="inactive">{{ __('label.inactive') }}</option>
                            </select>
                            <div class="text-muted fs-7">{{ __('message.admin.status_notice') }}</div>
                        </div>
                    </div>
                    <!--end::Status-->

                    <!--begin::Category & tags-->
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __('title.product_details') }}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <label class="form-label">{{ __('title.categories') }}</label>
                            <select class="form-select mb-2" name="category" data-control="select2" data-placeholder="Select an option">
                                @foreach($categories as $list)
                                <optgroup label="{{ $list->title }}">
                                    @if($list->child_cat->count()>0)
                                    @foreach ($list->child_cat as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                    @endif
                                </optgroup>
                                @endforeach
                            </select>
                            <div class="text-muted fs-7 mb-7">{{ __('message.admin.category_msg') }}</div>

                            <label class="form-label">{{ __('title.brands') }}</label>
                            <select class="form-select mb-2" name="brand" data-control="select2" data-placeholder="Select an option">
                                @foreach ($brands as $list)
                                <option value="{{ $list->id }}">{{ $list->title }}</option>
                                @endforeach
                            </select>
                            <div class="text-muted fs-7 mb-7">{{ __('message.admin.brand_msg') }}</div>

                        </div>
                    </div>
                    <!--end::Category & tags-->

                    <!--begin::Template settings-->
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __('label.product_template') }}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <select class="form-select mb-2" name="product_template" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="kt_ecommerce_add_product_store_template">
                                <option value="default" selected="selected">{{ __('label.default_product') }}</option>
                                <option value="glasses">{{ __('label.glasses') }}</option>
                                <option value="lens">{{ __('label.lens') }}</option>
                                <option value="contact_lens">{{ __('label.contact_lens') }}</option>
                            </select>
                            <div class="text-muted fs-7">{{ __('message.admin.product_template_notice') }}</div>
                        </div>
                    </div>
                    <!--end::Template settings-->

                </div>
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_product_general">{{ __('label.general') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_advanced">{{ __('label.advanced') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_description_tab">{{ __('label.description') }}</a>
                        </li>
                    </ul>
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>{{ __('label.general') }}</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="required form-label">{{ __('label.product_name') }}</label>
                                            <input type="text" name="product_name" class="form-control mb-2" placeholder="{{ __('label.product_name') }}" value="" />
                                            <div class="text-muted fs-7">{{ __('message.admin.name_notice') }}</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div>
                                            <label class="form-label">{{ __('label.summary') }}</label>
                                            <textarea id="kt_ecommerce_add_product_summary" name="kt_ecommerce_add_product_summary" class="min-h-200px mb-2"></textarea>
                                            <div class="text-muted fs-7">{{ __('message.admin.product_summary_msg') }}</div>
                                        </div>
                                        <!--end::Input group-->

                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::General options-->

                                <!--begin::Media-->
                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>{{ __('label.photos') }}</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="fv-row mb-2">
                                            <div class="dropzone" id="kt_ecommerce_add_product_media">
                                                <div class="dz-message needsclick">
                                                    <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                    <div class="ms-4">
                                                        <h3 class="fs-5 fw-bolder text-gray-900 mb-1">{{ __('message.admin.drop_files_msg') }}</h3>
                                                        <span class="fs-7 fw-bold text-gray-400">Upload up to 10 files</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-muted fs-7">{{ __('message.admin.photo_gallery_notice') }}</div>
                                    </div>
                                </div>
                                <!--end::Media-->

                                <!--begin::Pricing-->
                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>{{ __('label.pricing') }}</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="d-flex flex-wrap gap-5 mb-10">
                                            <div class="fv-row w-100 flex-md-root">
                                                <label class="required form-label">{{ __('label.base_price') }}</label>
                                                <input type="number" name="base_price" class="form-control mb-2" placeholder="{{ __('label.base_price') }}" value="" />
                                                <div class="text-muted fs-7">{{ __('message.admin.product_price_msg') }}</div>
                                            </div>
                                            <div class="fv-row w-100 flex-md-root">
                                                <label class="required form-label">{{ __('label.sale_price') }}</label>
                                                <input type="number" name="price"class="form-control mb-2" value="" placeholder="{{ __('label.sale_price') }}" />
                                                <div class="text-muted fs-7">{{ __('message.admin.product_price_msg') }}</div>
                                            </div>
                                        </div>

                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <label class="fs-6 fw-bold mb-2">
                                                {{ __('label.discount_type') }}
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Select a discount type that will be applied to this product"></i>
                                            </label>
                                            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
                                                <div class="col">
                                                    <label class="btn btn-outline btn-outline-dashed btn-outline-default active d-flex text-start p-6" data-kt-button="true">
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input class="form-check-input" type="radio" name="discount_option" value="1" checked="checked" />
                                                        </span>
                                                        <span class="ms-5">
                                                            <span class="fs-4 fw-bolder text-gray-800 d-block">{{ __('label.no_discount') }}</span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6" data-kt-button="true">
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input class="form-check-input" type="radio" name="discount_option" value="2" />
                                                        </span>
                                                        <span class="ms-5">
                                                            <span class="fs-4 fw-bolder text-gray-800 d-block">{{ __('label.percentage') }} %</span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6" data-kt-button="true">
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input class="form-check-input" type="radio" name="discount_option" value="3" />
                                                        </span>
                                                        <span class="ms-5">
                                                            <span class="fs-4 fw-bolder text-gray-800 d-block">{{ __('label.fixed_price') }}</span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-none mb-10 fv-row" id="kt_ecommerce_add_product_discount_percentage">
                                            <label class="form-label">{{ __('label.set_discount_percentage') }}</label>
                                            <div class="d-flex flex-column text-center mb-5">
                                                <div class="d-flex align-items-start justify-content-center mb-7">
                                                    <span class="fw-bolder fs-3x" id="kt_ecommerce_add_product_discount_label">0</span>
                                                    <span class="fw-bolder fs-4 mt-1 ms-2">%</span>
                                                </div>
                                                <div id="kt_ecommerce_add_product_discount_slider" class="noUi-sm"></div>
                                            </div>
                                            <div class="text-muted fs-7">{{ __('message.admin.set_discount_percent_msg') }}</div>
                                        </div>
                                        <div class="d-none mb-10 fv-row" id="kt_ecommerce_add_product_discount_fixed">
                                            <label class="form-label">{{ __('label.discounted_price') }}</label>
                                            <input type="number" name="dicsounted_price" class="form-control mb-2" placeholder="{{ __('label.discounted_price') }}" />
                                            <div class="text-muted fs-7">{{ __('message.admin.discounted_price_msg') }}</div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Pricing-->
                            </div>
                        </div>
                        <!--end::Tab pane-->
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>{{ __('label.inventory') }}</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="d-flex flex-wrap gap-5 mb-10">
                                            <div class="fv-row w-100 flex-md-root">
                                                <label class="required form-label">SKU</label>
                                                <input type="text" name="sku" class="form-control mb-2" placeholder="SKU {{ __('label.number') }}" value="" />
                                                <div class="text-muted fs-7">{{ __('message.admin.sku_msg') }}</div>
                                            </div>
                                            <div class="fv-row w-100 flex-md-root">
                                                <label class="required form-label">UPC</label>
                                                <input type="number" name="UPC"class="form-control mb-2" value="" placeholder="UPC {{ __('label.number') }}" />
                                                <div class="text-muted fs-7">Enter the products UPC</div>
                                            </div>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">{{ __('label.quantity') }}</label>
                                            <div class="d-flex gap-3">
                                                <input type="number" name="shelf" class="form-control mb-2" placeholder="{{ __('label.on_shelf') }}" value="" />
                                                <input type="number" name="warehouse" class="form-control mb-2" placeholder="{{ __('label.in_warehouse') }}" />
                                            </div>
                                            <div class="text-muted fs-7">{{ __('message.admin.product_quantity_msg') }}</div>
                                        </div>
                                        <div class="fv-row">
                                            <label class="form-label">{{ __('label.allow_backorder') }}</label>
                                            <div class="form-check form-check-custom form-check-solid mb-2">
                                                <input class="form-check-input" type="checkbox" name="backorder" name="allow_backorder" value="" />
                                                <label class="form-check-label">{{ __('label.yes') }}</label>
                                            </div>
                                            <div class="text-muted fs-7">{{ __('message.admin.backorder_allow_msg') }}</div>
                                        </div>
                                    </div>
                                </div>

                                <!--begin::Variations-->
                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>{{ __('label.variations') }}</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                                            <label class="form-label">Add Product Variations</label>
                                            <div id="kt_ecommerce_add_product_options">
                                                <!--begin::Form group-->
                                                <div class="form-group">
                                                    <div data-repeater-list="kt_ecommerce_add_product_options" class="d-flex flex-column gap-3">
                                                        <div data-repeater-item="" class="form-group d-flex flex-wrap gap-5">
                                                            <!--begin::Select2-->
                                                            <div class="w-100 w-md-200px">
                                                                <select class="form-select" name="product_option" data-placeholder="Select a variation" data-kt-ecommerce-catalog-add-product="product_option">
                                                                    <option></option>
                                                                    <option value="color">Color</option>
                                                                    <option value="size">Size</option>
                                                                    <option value="material">Material</option>
                                                                    <option value="style">Style</option>
                                                                </select>
                                                            </div>
                                                            <!--end::Select2-->
                                                            <!--begin::Input-->
                                                            <input type="text" class="form-control mw-100 w-200px" name="product_option_value" placeholder="Variation" />
                                                            <input type="number" class="form-control mw-100 w-200px" name="product_option_price" placeholder="Price" />
                                                            <!--end::Input-->
                                                            <button type="button" data-repeater-delete="" class="btn btn-sm btn-icon btn-light-danger">
                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                                                <span class="svg-icon svg-icon-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="black" />
                                                                        <rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Form group-->
                                                <!--begin::Form group-->
                                                <div class="form-group mt-5">
                                                    <button type="button" data-repeater-create="" class="btn btn-sm btn-light-primary">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
                                                            <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Add another variation</button>
                                                </div>
                                                <!--end::Form group-->
                                            </div>
                                            <!--end::Repeater-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::Variations-->

                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>{{ __('label.inventory') }}</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="mb-5 fv-row">
                                            <label class="form-label">SPH</label>
                                            <input id="kt_tagify_1" class="form-control mb-2" name="attr_sph" />
                                            <div class=" fs-7 text-muted">Select in range of 10 - 20</div>
                                        </div>
                                        <div class="mb-5 fv-row">
                                            <label class="form-label">CYL</label>
                                            <input id="kt_tagify_2" class="form-control mb-2" name="attr_cyl" />
                                            <div class=" fs-7 text-muted">Select Values in range of 10 - 20</div>
                                        </div>
                                        <div class="mb-5 fv-row">
                                            <label class="form-label">DIA</label>
                                            <input id="kt_tagify_3" class="form-control mb-2" name="attr_dia" />
                                            <div class=" fs-7 text-muted">Select Values in range of 10 - 20</div>
                                        </div>
                                        <div class="mb-5 fv-row">
                                            <label class="form-label">AXIS</label>
                                            <input id="kt_tagify_4" class="form-control mb-2" name="attr_axis" />
                                            <div class=" fs-7 text-muted">Select Values in range of 10 - 20</div>
                                        </div>
                                        <div class="mb-5 fv-row">
                                            <label class="form-label">RAD</label>
                                            <input id="kt_tagify_5" class="form-control mb-2" name="attr_rad" />
                                            <div class=" fs-7 text-muted">Select Values in range of 10 - 20</div>
                                        </div>
                                        <div class="mb-5 fv-row">
                                            <label class="form-label">ADD</label>
                                            <input id="kt_tagify_7" class="form-control mb-2" name="attr_add" />
                                            <div class=" fs-7 text-muted">Select Values in range of 10 - 20</div>
                                        </div>
                                        <div class="mb-5 fv-row">
                                            <label class="form-label">Colors</label>
                                            <input id="kt_tagify_6" class="form-control mb-2" name="attr_colors" />
                                            <div class=" fs-7 text-muted">Select Values in range of 10 - 20</div>
                                        </div>
                                    </div>
                                </div>

                                <!--begin::Shipping-->
                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>{{ __('title.shipping') }}</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="fv-row">
                                            <div class="form-check form-check-custom form-check-solid mb-2">
                                                <input class="form-check-input" type="checkbox" name="is_physical" id="kt_ecommerce_add_product_shipping_checkbox" value="1" />
                                                <label class="form-check-label">{{ __('message.admin.physical_option') }}</label>
                                            </div>
                                            <div class="text-muted fs-7">{{ __('message.admin.product_physical_msg') }}</div>
                                        </div>
                                        <div id="kt_ecommerce_add_product_shipping" class="d-none mt-10">
                                            <div class="mb-10 fv-row">
                                                <label class="form-label">{{ __('label.weight') }}</label>
                                                <input type="number" name="weight" class="form-control mb-2" placeholder="{{ __('label.weight') }}" value="" />
                                                <div class="text-muted fs-7">{{ __('message.admin.product_weight_msg') }}</div>
                                            </div>
                                            <div class="fv-row">
                                                <label class="form-label">{{ __('label.dimension') }}</label>
                                                <div class="d-flex flex-wrap flex-sm-nowrap gap-3">
                                                    <input type="number" name="width" class="form-control mb-2" placeholder="{{ __('label.width') }} (w)" value="" />
                                                    <input type="number" name="height" class="form-control mb-2" placeholder="{{ __('label.height') }} (h)" value="" />
                                                    <input type="number" name="length" class="form-control mb-2" placeholder="{{ __('label.length') }} (l)" value="" />
                                                </div>
                                                <div class="text-muted fs-7">{{ __('message.admin.product_dimension_msg') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Shipping-->

                            </div>
                        </div>
                        <!--end::Tab pane-->
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade" id="kt_ecommerce_add_product_description_tab" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>{{ __('label.description') }}</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="mb-10 fv-row">
                                            <label class="form-label">{{ __('label.description') }}</label>
                                            <textarea name="kt_ecommerce_add_product_description" id="kt_ecommerce_add_product_description"></textarea>
                                            <div class="text-muted fs-7 mb-10">{{ __('message.admin.description_notice') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Tab pane-->
                    </div>
                    <!--end::Tab content-->
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.product.index') }}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">{{ __('title.buttons.cancel') }}</a>
                        <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                            <span class="indicator-label">{{ __('title.buttons.save_chnages') }}</span>
                            <span class="indicator-progress">{{ __('message.alert.please_wait') }}...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </div>
                <!--end::Main column-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

@endsection

@push('page-script')
    <script src="{{ asset('admin-assets/js/pages/product/add.js') }}"></script>
@endpush
