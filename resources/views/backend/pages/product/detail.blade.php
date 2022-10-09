@extends('backend.layout.app')

@push('page-title')

    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">{{ __('label.product') }} - {{ $product->title }}</h1>
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
        <li class="breadcrumb-item text-dark">{{ __('label.product') }} - {{ $product->title }}</li>
    </ul>

@endpush

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Form-->
            <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row gap-7 gap-lg-10" data-kt-redirect="{{ route('admin.product.index') }}">
                @csrf
                <input name="product_id" id="product_id" value="{{ $product->id }}" hidden>
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
                            <div class="image-input {{ !empty($product->photo)?'':'image-input-empty' }} image-input-outline mb-3" data-kt-image-input="true" style="background-image: url({{ asset('admin-assets/media/svg/files/blank-image.svg') }})">
                                @empty($product->photo)
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                @else
                                <div class="image-input-wrapper w-150px h-150px" style="background-image: url({{ asset('products/'.$product->photo) }})"></div>
                                @endempty
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <input type="file" name="product_image"  id="product_image" accept=".png, .jpg, .jpeg" />
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
                                <div class="rounded-circle bg-{{ $product->status == 'active' ? 'success' : 'danger' }} w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <select name="status" class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="kt_ecommerce_add_product_status_select">
                                <option></option>
                                <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>{{ __('label.active') }}</option>
                                <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>{{ __('label.inactive') }}</option>
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
                                    <option value="{{ $item->id }}" {{ $product->cat_id == $item->id ? 'selected' : '' }}>{{ $item->title }}</option>
                                    @endforeach
                                    @endif
                                </optgroup>
                                @endforeach
                            </select>
                            <div class="text-muted fs-7 mb-7">{{ __('message.admin.category_msg') }}</div>
                            <label class="form-label">{{ __('title.brands') }}</label>
                            <select class="form-select mb-2" name="brand" data-control="select2" data-placeholder="Select an option">
                                @foreach ($brands as $list)
                                <option value="{{ $list->id }}"{{ $product->brand_id == $list->id ? 'selected' : '' }}>{{ $list->title }}</option>
                                @endforeach
                            </select>
                            <div class="text-muted fs-7 mb-7">{{ __('message.admin.brand_msg') }}</div>
                        </div>
                        <!--end::Card body-->
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
                                <option value="default" {{ $product->template == "default" ? 'selected' : '' }}>{{ __('label.default_product') }}</option>
                                <option value="glasses" {{ $product->template == "glasses" ? 'selected' : '' }}>{{ __('label.glasses') }}</option>
                                <option value="lens" {{ $product->template == "lens" ? 'selected' : '' }}>{{ __('label.lens') }}</option>
                                <option value="contact_lens" {{ $product->template == "contact_lens" ? 'selected' : '' }}>{{ __('label.contact_lens') }}</option>
                            </select>
                            <div class="text-muted fs-7">{{ __('message.admin.product_template_notice') }}</div>
                        </div>
                    </div>
                    <!--end::Template settings-->

                </div>
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin:::Tabs-->
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
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_reviews">{{ __('label.reviews') }}</a>
                        </li>
                    </ul>
                    <!--end:::Tabs-->
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
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">{{ __('label.product_name') }}</label>
                                            <input type="text" name="product_name" class="form-control mb-2" placeholder="{{ __('label.product_name') }}" value="{{ $product->title }}" />
                                            <div class="text-muted fs-7">{{ __('message.admin.name_notice') }}</div>
                                        </div>
                                        <div>
                                            <label class="form-label">{{ __('label.summary') }}</label>
                                            <div id="kt_ecommerce_update_product_summary" name="kt_ecommerce_update_product_summary" class="min-h-200px mb-2">
                                                {!! $product->summary !!}
                                            </div>
                                            <div class="text-muted fs-7">{{ __('message.admin.product_summary_msg') }}</div>
                                        </div>
                                    </div>
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
                                                <input type="number" name="base_price" class="form-control mb-2" placeholder="{{ __('label.base_price') }}" value="{{ $product->base_price }}" />
                                                <div class="text-muted fs-7">{{ __('message.admin.product_price_msg') }}</div>
                                            </div>
                                            <div class="fv-row w-100 flex-md-root">
                                                <label class="required form-label">{{ __('label.sale_price') }}</label>
                                                <input type="number" name="price"class="form-control mb-2" value="{{ $product->price }}" placeholder="{{ __('label.sale_price') }}" />
                                                <div class="text-muted fs-7">{{ __('message.admin.product_price_msg') }}</div>
                                            </div>
                                        </div>
                                        <div class="fv-row mb-10">
                                            <label class="fs-6 fw-bold mb-2">
                                                {{ __('label.discount_type') }}
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Select a discount type that will be applied to this product"></i>
                                            </label>
                                            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
                                                <div class="col">
                                                    <label class="btn btn-outline btn-outline-dashed btn-outline-default {{ $product->discount_option == '1' ? "active" : '' }} d-flex text-start p-6" data-kt-button="true">
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input class="form-check-input" type="radio" name="discount_option" value="1" {{ $product->discount_option == '1' ? "checked" : '' }} />
                                                        </span>
                                                        <span class="ms-5">
                                                            <span class="fs-4 fw-bolder text-gray-800 d-block">{{ __('label.no_discount') }}</span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <label class="btn btn-outline btn-outline-dashed btn-outline-default {{ $product->discount_option == '2' ? "active" : '' }} d-flex text-start p-6" data-kt-button="true">
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input class="form-check-input" type="radio" name="discount_option" value="2" {{ $product->discount_option == '2' ? "checked" : '' }} />
                                                        </span>
                                                        <span class="ms-5">
                                                            <span class="fs-4 fw-bolder text-gray-800 d-block">{{ __('label.percentage') }} %</span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <label class="btn btn-outline btn-outline-dashed btn-outline-default {{ $product->discount_option == '3' ? "active" : '' }} d-flex text-start p-6" data-kt-button="true">
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input class="form-check-input" type="radio" name="discount_option" value="3" {{ $product->discount_option == '3' ? "checked" : '' }} />
                                                        </span>
                                                        <span class="ms-5">
                                                            <span class="fs-4 fw-bolder text-gray-800 d-block">{{ __('label.fixed_price') }}</span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="{{ $product->discount_option == '2' ? '' : 'd-none' }} mb-10 fv-row" id="kt_ecommerce_add_product_discount_percentage">
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
                                        <div class="{{ $product->discount_option == '3' ? '' : 'd-none' }} mb-10 fv-row" id="kt_ecommerce_add_product_discount_fixed">
                                            <label class="form-label">{{ __('label.discounted_price') }}</label>
                                            <input type="number" name="dicsounted_price" class="form-control mb-2" placeholder="{{ __('label.discounted_price') }}" value="{{ $product->discounted_price }}" />
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
                                <!--begin::Inventory-->
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
                                                <input type="text" name="sku" class="form-control mb-2" placeholder="SKU {{ __('label.number') }}" value="{{ $product->SKU }}" />
                                                <div class="text-muted fs-7">{{ __('message.admin.sku_msg') }}</div>
                                            </div>
                                            <div class="fv-row w-100 flex-md-root">
                                                <label class="required form-label">UPC</label>
                                                <input type="number" name="UPC"class="form-control mb-2" value="{{ $product->UPC }}" placeholder="UPC {{ __('label.number') }}" />
                                                <div class="text-muted fs-7">Enter the products UPC</div>
                                            </div>
                                        </div>

                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">{{ __('label.quantity') }}</label>
                                            <div class="d-flex gap-3">
                                                <input type="number" name="shelf" class="form-control mb-2" placeholder="On shelf" value="{{ $product->stock }}" />
                                                <input type="number" name="warehouse" class="form-control mb-2" placeholder="In warehouse" value="{{ $product->warehouse }}" />
                                            </div>
                                            <div class="text-muted fs-7">{{ __('message.admin.product_quantity_msg') }}</div>
                                        </div>
                                        <div class="fv-row">
                                            <label class="form-label">{{ __('label.allow_backorder') }}</label>
                                            <div class="form-check form-check-custom form-check-solid mb-2">
                                                <input class="form-check-input" type="checkbox" name="backorder" {{ $product->backorder == 'enable' ? 'checked' : '' }} value="" />
                                                <label class="form-check-label">{{ __('label.yes') }}</label>
                                            </div>
                                            <div class="text-muted fs-7">{{ __('message.admin.backorder_allow_msg') }}</div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Inventory-->
                                <!--begin::Variations-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Variations</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                                            <!--begin::Label-->
                                            <label class="form-label">Add Product Variations</label>
                                            <!--end::Label-->
                                            <!--begin::Repeater-->
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
                                        <div class="mb-10 fv-row">
                                            <label class="form-label">SPH</label>
                                            <input id="kt_tagify_1" class="form-control mb-2" name="attr_sph" value="{{ $product->SPH }}" />
                                            <div class=" fs-7 text-muted">Select in range of 10 - 20</div>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="form-label">CYL</label>
                                            <input id="kt_tagify_2" class="form-control mb-2" name="attr_cyl" value="{{ $product->CYL }}" />
                                            <div class=" fs-7 text-muted">Select Values in range of 10 - 20</div>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="form-label">DIA</label>
                                            <input id="kt_tagify_3" class="form-control mb-2" name="attr_dia" value="{{ $product->DIA }}" />
                                            <div class=" fs-7 text-muted">Select Values in range of 10 - 20</div>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="form-label">AXIS</label>
                                            <input id="kt_tagify_4" class="form-control mb-2" name="attr_axis" value="{{ $product->AXIS }}" />
                                            <div class=" fs-7 text-muted">Select Values in range of 10 - 20</div>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="form-label">RAD</label>
                                            <input id="kt_tagify_5" class="form-control mb-2" name="attr_rad" value="{{ $product->RAD }}" />
                                            <div class=" fs-7 text-muted">Select Values in range of 10 - 20</div>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="form-label">ADD</label>
                                            <input id="kt_tagify_7" class="form-control mb-2" name="attr_add" value="{{ $product->ADD }}" />
                                            <div class=" fs-7 text-muted">Select Values in range of 10 - 20</div>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="form-label">Colors</label>
                                            <input id="kt_tagify_6" class="form-control mb-2" name="attr_colors" value="{{ $product->colors }}" />
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
                                                <input class="form-check-input" name="is_physical" type="checkbox" id="kt_ecommerce_add_product_shipping_checkbox" value="1" {{ $product->is_physical == 'yes' ? 'checked' : '' }} />
                                                <label class="form-check-label">{{ __('message.admin.physical_option') }}</label>
                                            </div>
                                            <div class="text-muted fs-7">{{ __('message.admin.product_physical_msg') }}</div>
                                        </div>
                                        <div id="kt_ecommerce_add_product_shipping" class="{{ $product->is_physical == 'yes' ? '' : 'd-none' }} mt-10">
                                            <div class="mb-10 fv-row">
                                                <label class="form-label">{{ __('label.weight') }}</label>
                                                <input type="number" name="weight" class="form-control mb-2" placeholder="{{ __('label.weight') }}" value="{{ $product->weight }}" />
                                                <div class="text-muted fs-7">{{ __('message.admin.product_weight_msg') }}</div>
                                            </div>
                                            <div class="fv-row">
                                                <label class="form-label">{{ __('label.dimension') }}</label>
                                                <div class="d-flex flex-wrap flex-sm-nowrap gap-3">
                                                    <input type="number" name="width" class="form-control mb-2" placeholder="{{ __('label.width') }} (w)" value="{{ $product->width }}" />
                                                    <input type="number" name="height" class="form-control mb-2" placeholder="{{ __('label.height') }} (h)" value="{{ $product->height }}" />
                                                    <input type="number" name="length" class="form-control mb-2" placeholder="{{ __('label.length') }} (l)" value="{{ $product->length }}" />
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
                                            <textarea name="kt_ecommerce_update_product_description" id="kt_ecommerce_update_product_description">{!! $product->description !!}</textarea>
                                            <div class="text-muted fs-7 mb-10">{{ __('message.admin.description_notice') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Tab pane-->
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade" id="kt_ecommerce_add_product_reviews" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <!--begin::Reviews-->
                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>{{ __('label.customer_reviews') }}</h2>
                                        </div>
                                        <div class="card-toolbar">
                                            <span class="fw-bolder me-5">{{ __('label.overall_rating') }}:</span>
                                            <div class="rating">
                                                <div class="rating-label {{ Helper::getProductReview($product->id)>=20?'checked':'' }}">
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="black" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="rating-label {{ Helper::getProductReview($product->id)>=40?'checked':'' }}">
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="black" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="rating-label {{ Helper::getProductReview($product->id)>=60?'checked':'' }}">
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="black" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="rating-label {{ Helper::getProductReview($product->id)>=80?'checked':'' }}">
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="black" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="rating-label {{ Helper::getProductReview($product->id)>=100?'checked':'' }}">
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="black" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Table-->
                                        <table class="table table-row-dashed fs-6 gy-5 my-0" id="kt_ecommerce_add_product_reviews">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                    <th class="w-10px pe-2">
                                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_add_product_reviews .form-check-input" value="1" />
                                                        </div>
                                                    </th>
                                                    <th class="min-w-125px">{{ __('label.rating') }}</th>
                                                    <th class="min-w-175px">{{ __('label.customer') }}</th>
                                                    <th class="min-w-175px">{{ __('label.comment') }}</th>
                                                    <th class="min-w-100px text-end fs-7">{{ __('label.date') }}</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                @forelse ($reviews as $list)
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                            <input class="form-check-input" type="checkbox" value="{{ $list->id }}" />
                                                        </div>
                                                    </td>
                                                    <td data-order="{{ $list->rate }}">
                                                        <div class="rating">
                                                            <div class="rating-label {{ $list->rate >= 1 ? 'checked' : '' }}">
                                                                <span class="svg-icon svg-icon-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="black" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <div class="rating-label {{ $list->rate >= 2 ? 'checked' : '' }}">
                                                                <span class="svg-icon svg-icon-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="black" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <div class="rating-label {{ $list->rate >= 3 ? 'checked' : '' }}">
                                                                <span class="svg-icon svg-icon-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="black" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <div class="rating-label {{ $list->rate >= 4 ? 'checked' : '' }}">
                                                                <span class="svg-icon svg-icon-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="black" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <div class="rating-label {{ $list->rate >= 5 ? 'checked' : '' }}">
                                                                <span class="svg-icon svg-icon-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="black" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.user.detail', $list->user_id)}}" class="d-flex text-dark text-gray-800 text-hover-primary">
                                                            <div class="symbol symbol-circle symbol-25px me-3">
                                                                @empty($list->user_info->photo)
                                                                <div class="symbol-label bg-light-{{ $state = Helper::getRandomStatus() }}">
                                                                    <span class="text-{{ $state }}">{{ ucfirst($list->user_info->name[0]) }}</span>
                                                                </div>
                                                                @else
                                                                <span class="symbol-label" style="background-image:url({{ asset('users/'.$list->user_info->photo) }})"></span>
                                                                @endempty
                                                            </div>
                                                            <span class="fw-bolder">{{ $list->user_info->name }}</span>
                                                        </a>
                                                    </td>
                                                    <td class="text-gray-600 fw-bolder">{{ $list->review }}</td>
                                                    <td class="text-end">
                                                        <span class="fw-bold text-muted">{{ date_format($list->created_at, "d M Y") }}</span>
                                                    </td>
                                                </tr>
                                                @empty

                                                @endforelse

                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Reviews-->
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
    <script src="{{ asset('admin-assets/js/pages/product/detail.js') }}"></script>
@endpush
