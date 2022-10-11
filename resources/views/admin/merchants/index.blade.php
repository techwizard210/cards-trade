@extends('admin.layout.app')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Merchants</h5>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <span class="text-muted">CRM</span>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="text-muted">Merchants</span>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Details-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Merchants
                        <span class="d-block text-muted pt-2 font-size-sm">Manage all Merchants and edit details</span></h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        {{-- <a href="{{ URL::to('admin/add-user') }}" class="btn btn-primary font-weight-bolder">
                            <i class="fas fa-user-plus"></i> {{ __('title.add_user') }}
                        </a> --}}
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin: Search Form-->
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-4 col-xl-4">
                                <div class="row align-items-center">
                                    <div class="col-md-12 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" placeholder="Search..." id="admin_users_table_search" />
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xl-8 mt-5 mt-lg-0">
                                <a href="#" class="btn btn-primary px-6 font-weight-bold">Search</a>
                            </div>
                        </div>
                    </div>
                    <!--end::Search Form-->
                    <!--end: Search Form-->
                    <!--begin: Selected Rows Group Action Form-->
                    <div class="mt-10 mb-5 collapse" id="admin_users_table_action_form">
                        <div class="d-flex align-items-center">
                            <div class="font-weight-bold text-danger mr-3">Selected
                            <span id="admin_users_table_selected_records">0</span> records:</div>
                            <div class="dropdown mr-2">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">Update Status</button>
                                <div class="dropdown-menu dropdown-menu-sm">
                                    <ul class="nav nav-hover flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link btn-user-status" data="active">
                                                <span class="nav-text">Active</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link btn-user-status" data="inactive">
                                                <span class="nav-text">Inactive</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-danger mr-2" type="button" id="admin_users_table_delete_all">Delete All</button>
                        </div>
                    </div>
                    <!--end: Selected Rows Group Action Form-->
                    <!--begin: Datatable-->
                    <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
                    <!--end: Datatable-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

@endsection

@push('page-scripts')
    <script type="text/javascript" src="{{ asset('admin-assets/js/pages/merchants/index.js') }}"></script>
@endpush
