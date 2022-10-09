<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
    <!--begin::Container-->
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-bold me-1">Copyright &copy; 2020-{{ date('Y') }}</span>
            <a href="{{ route('home', app()->getLocale()) }}" target="_blank" class="text-gray-800 text-hover-primary">{{ Helper::getCommonSetting('company_logo_name') }}</a>
        </div>
        <!--end::Copyright-->
    </div>
    <!--end::Container-->
</div>
