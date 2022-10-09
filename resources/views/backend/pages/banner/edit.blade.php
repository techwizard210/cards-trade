@extends('backend.layout.app')

@push('page-title')

    <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">{{ $content->title }}</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">{{ __('title.home') }}</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('admin.banner.index') }}" class="text-muted text-hover-primary">{{ __('title.banners') }}</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-dark">{{ $content->title }}</li>
    </ul>

@endpush

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">

            <form id="kt_ecommerce_update_brand_form" class="form d-flex flex-column flex-lg-row gap-7 gap-lg-10" data-kt-redirect="{{ route('admin.banner.index') }}">

                @csrf

                <input name="id" value="{{ $content->id }}" hidden>
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px">

                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __('label.thumbnail') }}</h2>
                            </div>
                        </div>
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                            <div class="image-input {{ !empty($content->photo)?'':'image-input-empty' }} image-input-outline mb-3" data-kt-image-input="true" style="background-image: url({{ asset('admin-assets/media/svg/files/blank-image.svg') }})">
                                @empty($content->photo)
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                @else
                                <div class="image-input-wrapper w-150px h-150px" style="background-image: url({{ asset('/storage/banners/'.$content->photo) }})"></div>
                                @endempty
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                </label>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                            </div>
                            <!--end::Image input-->
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
                                <div class="rounded-circle {{ $content->status == 'active' ? 'bg-success' : 'bg-danger' }} w-15px h-15px" id="kt_ecommerce_add_brand_status"></div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <select class="form-select mb-2" name="status" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="kt_ecommerce_add_brand_status_select">
                                <option></option>
                                <option value="active" {{ $content->status == 'active' ? 'selected' : '' }}>{{ __('label.active') }}</option>
                                <option value="inactive" {{ $content->status == 'inactive' ? 'selected' : '' }}>{{ __('label.inactive') }}</option>
                            </select>
                            <div class="text-muted fs-7">{{ __('message.admin.status_notice') }}</div>
                        </div>
                    </div>
                    <!--end::Status-->

                </div>
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush py-4 pb-20">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __('label.general') }}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-5 fv-row">
                                <label class="required form-label">{{ __('label.title') }}</label>
                                <input type="text" name="title" class="form-control mb-2" placeholder="{{ __('label.title') }}" value="{{ $content->title }}" />
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-5 fv-row">
                                <label class="required form-label">{{ __('label.subtitle') }}</label>
                                <input type="text" name="subtitle" class="form-control mb-2" placeholder="{{ __('label.subtitle') }}" value="{{ $content->subtitle }}" />
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-5 fv-row">
                                <label class="required form-label">{{ __('label.description') }} 1</label>
                                <input type="text" name="description1" class="form-control mb-2" placeholder="{{ __('label.description') }} 1" value="{{ $content->desc1 }}" />
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-5 fv-row">
                                <label class="required form-label">{{ __('label.description') }} 2</label>
                                <input type="text" name="description2" class="form-control mb-2" placeholder="{{ __('label.description') }} 2" value="{{ $content->desc2 }}" />
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-5 fv-row">
                                <label class="required form-label">{{ __('label.description') }} 3</label>
                                <input type="text" name="description3" class="form-control mb-2" placeholder="{{ __('label.description') }} 3" value="{{ $content->desc3 }}" />
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-5 fv-row">
                                <label class="required form-label">{{ __('label.price') }}</label>
                                <input type="number" name="price" class="form-control mb-2" value="{{ $content->price }}" />
                            </div>
                            <!--end::Input group-->

                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->

                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('admin.banner.index') }}" id="kt_ecommerce_update_product_cancel" class="btn btn-light me-5">{{ __('title.buttons.cancel') }}</a>
                        <button type="submit" id="kt_ecommerce_update_brand_submit" class="btn btn-primary">
                            <span class="indicator-label">{{ __('title.buttons.save_chnages') }}</span>
                            <span class="indicator-progress">{{ __('message.alert.please_wait') }}...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

@endsection

@push('page-script')
    <script src="{{ asset('admin-assets/js/pages/banner/edit.js') }}"></script>
@endpush
