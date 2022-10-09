<script>var HOST_URL = "{{ URL::to('/admin') }}";</script>
<script>var JSON_TITLE = @json( __('title') );</script>
<script>var JSON_MESSAGE = @json( __('message') );</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('admin-assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('admin-assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{ asset('admin-assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/custom/vis-timeline/vis-timeline.bundle.js') }}"></script>
{{-- <script src="{{ asset('admin-assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script> --}}
<script src="{{ asset('admin-assets/plugins/custom/ckeditor/ckeditor.js') }}"></script>
<script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script>
<script>CKFinder.config( { connectorPath: '/ckfinder/connector' } );</script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('admin-assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('admin-assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('admin-assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('admin-assets/js/custom/intro.js') }}"></script>
<script src="{{ asset('admin-assets/js/custom/modals/create-app.js') }}"></script>
<script src="{{ asset('admin-assets/js/custom/modals/upgrade-plan.js') }}"></script>
<!--end::Page Custom Javascript-->
@stack('page-script')
<!--end::Javascript-->
