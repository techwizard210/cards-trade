"use strict";
// Class definition

var KTAppsUsersListDatatable = function() {
	// Private functions
    var options = {

        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: HOST_URL + '/getUserData',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                },
            },
            pageSize: 10, // display 20 records per page
            serverSorting: false,
        },

        // layout definition
        layout: {
            scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
            footer: false, // display/hide footer
        },

        // column sorting
        sortable: true,
        pagination: true,

        search: {
            input: $('#kt_subheader_search_form'),
            delay: 400,
            key: 'generalSearch'
        },

        // columns definition
        columns: [
            {
                field: 'id',
                title: '#',
                sortable: false,
                width: 20,
                selector: {
                    class: ''
                },
                textAlign: 'center',
            }, {
                field: 'firstname',
                title: 'Name',
                width: 250,
                template: function(data) {

                    var user_img = data.profile;

                    var agent_name = 'Administrator';

                    if(data.agent_name != null) agent_name = data.agent_name;

                    var output = '';
                    if (user_img != '' && user_img != null ) {
                        output = '<div class="d-flex align-items-center">\
                            <div class="symbol symbol-40 symbol-sm flex-shrink-0">\
                                <img class="" src="' + user_img + '" alt="photo">\
                            </div>\
                            <div class="ml-4">\
                                <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">' + data.first_name + ' ' + data.last_name + '</div>\
                                <a href="#" class="text-muted font-weight-bold text-hover-primary">' + data.email + '</a>\
                            </div>\
                        </div>';
                    }
                    else {
                        var stateNo = KTUtil.getRandomInt(0, 7);
                        var states = [
                            'success',
                            'primary',
                            'danger',
                            'success',
                            'warning',
                            'dark',
                            'primary',
                            'info'];
                        var state = states[stateNo];

                        output = '<div class="d-flex align-items-center">\
                            <div class="symbol symbol-40 symbol-light-'+state+' flex-shrink-0">\
                                <span class="symbol-label font-size-h4 font-weight-bold">' + data.first_name.substring(0, 1) + '</span>\
                            </div>\
                            <div class="ml-4">\
                                <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">' + data.first_name + ' ' + data.last_name + '</div>\
                                <a href="#" class="text-muted font-weight-bold text-hover-primary">' + data.email + '</a>\
                            </div>\
                        </div>';
                    }

                    return output;
                },
            }, {
                field: 'country',
                title: 'Country',
                template: function(row) {
                    var output = '';

                    output += '<div class="font-weight-bolder font-size-lg mb-0">' + row.country_name + '</div>';

                    return output;
                },
            }, {
                field: 'phone',
                title: 'Phone',
                template: function(row) {
                    var output = '';

                    output += '<div class="font-weight-bolder text-info font-size-md mb-0">' + row.phone + '</div>';

                    return output;
                },
            }, {
                field: 'created_at',
                title: 'Created At',
                width: 100,
                template: function(row) {
                    var output = '';

                    output += '<div class="font-weight-bolder mb-0">' + row.created_at.substring(0,10) + '</div>';

                    return output;
                },
            }, {
                field: 'status',
                title: 'Status',
                width: 70,
                // callback function support for column rendering
                template: function(row) {
                    var status = {
                        'active': {'title': 'Active', 'class': ' label-primary'},
                        'inactive': {'title': 'Inactive', 'class': ' label-danger'},
                    };
                    return '<span class="label label-lg font-weight-bold ' + status[row.status].class + ' label-inline">' + status[row.status].title + '</span>';
                },
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    return '\
                        <div class="dropdown dropdown-inline">\
                            <a href="javascript:;" class="btn btn-sm btn-icon mr-1" data-toggle="dropdown">\
                                <i class="fas fa-cog"></i>\
                            </a>\
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
                                <ul class="navi flex-column navi-hover py-2">\
                                    <li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">\
                                        Choose a status:\
                                    </li>\
                                    <li class="navi-item">\
                                        <a href="javascript:;" class="navi-link btn-user-status-update" data-status="Active" data="' + row.id + '">\
                                            <span class="navi-text">Active</span>\
                                        </a>\
                                    </li>\
                                    <li class="navi-item">\
                                        <a href="javascript:;" class="navi-link btn-user-status-update" data-status="Inactive" data="' + row.id + '">\
                                            <span class="navi-text">Inactive</span>\
                                        </a>\
                                    </li>\
                                </ul>\
                            </div>\
                        </div>\
                        <a href="' + HOST_URL + '/user-detail/' + row.id + '" class="btn btn-sm btn-icon mr-1" title="Edit details">\
                            <i class="fas fa-edit"></i>\
                        </a>\
                        <a href="javascript:;" class="btn btn-sm btn-icon btn-user-delete" title="Delete" data="' + row.id + '">\
                            <i class="far fa-trash-alt"></i>\
                        </a>\
                    ';
                },
        }],

    };

	// basic demo
	var _demo = function() {

        // enable extension
        options.extensions = {
            // boolean or object (extension options)
            checkbox: true,
        };
        options.search = {
            input: $('#admin_users_table_search'),
            key: 'generalSearch'
        };

		var datatable = $('#kt_datatable').KTDatatable(options);

		datatable.on('datatable-on-click-checkbox', function(e) {

            // datatable.checkbox() access to extension methods
            var ids = datatable.checkbox().getSelectedId();
            var count = ids.length;

            $('#admin_users_table_selected_records').html(count);

            if (count > 0) {
                $('#admin_users_table_action_form').collapse('show');
            } else {
                $('#admin_users_table_action_form').collapse('hide');
            }
        });

        $('#admin_users_table_delete_all').on('click', function(e) {

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete them!"
            }).then(function(result) {

                if (result.value) {

                    var ids = datatable.checkbox().getSelectedId();

                    $.ajax({
                        url: HOST_URL + '/delete-users',
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            ids: ids,
                        },
                        cache: false,
                        success: function(response) {

                            if(response.status == 'error') {
                                toastr.error(response.message, 'Error');
                            }
                            else if(response.status == 'success'){

                                toastr.success('Users has been removed successfully', 'Success');
                                datatable.reload();
                                $('#admin_users_table_action_form').collapse('hide');

                            } else {
                                toastr.warning('Something went wrong!', 'Warning');
                            }

                        },
                        error: function(response) {

                            toastr.error("Server connection failed", "Connection Error");

                        }
                    });
                }
            });

        });

        $('body').on('click', '.btn-user-delete', function() {

            var ids = [];

            ids.push($(this).attr('data'));

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete this user!"
            }).then(function(result) {

                if (result.value) {

                    $.ajax({
                        url: HOST_URL + '/delete-users',
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            ids: ids,
                        },
                        cache: false,
                        success: function(response) {

                            if(response.status == 'error') {
                                toastr.error(response.message, 'Error');
                            }
                            else if(response.status == 'success'){

                                toastr.success('User has been removed successfully', 'Success');
                                datatable.reload();

                            } else {
                                toastr.warning('Something went wrong!', 'Warning');
                            }

                        },
                        error: function(response) {

                            toastr.error("Server connection failed", "Connection Error");

                        }
                    });
                }
            });

        });

        $('.btn-user-status').on('click', function(e) {

            var ids = datatable.checkbox().getSelectedId();

            var status = $(this).attr('data');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, update them!"
            }).then(function(result) {

                if (result.value) {

                    $.ajax({
                        url: HOST_URL + '/update-status-users',
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            ids: ids,
                            status: status,
                        },
                        cache: false,
                        success: function(response) {

                            if(response.status == 'error') {
                                toastr.error(response.message, 'Error');
                            }
                            else if(response.status == 'success'){

                                toastr.success('User Status has been updated successfully', 'Success');
                                $('#admin_users_table_action_form').collapse('hide');
                                datatable.reload();

                            } else {
                                toastr.warning('Something went wrong!', 'Warning');
                            }

                        },
                        error: function(response) {

                            toastr.error("Server connection failed", "Connection Error");

                        }
                    });
                }
            });

        });

        $('body').on('click', '.btn-user-status-update', function() {

            var ids = [];

            ids.push($(this).attr('data'));

            var status = $(this).attr('data-status');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, update this user!"
            }).then(function(result) {

                if (result.value) {

                    $.ajax({
                        url: HOST_URL + '/update-status-users',
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            ids: ids,
                            status: status,
                        },
                        cache: false,
                        success: function(response) {

                            if(response.status == 'error') {
                                toastr.error(response.message, 'Error');
                            }
                            else if(response.status == 'success'){

                                toastr.success('User status has been updated successfully', 'Success');
                                datatable.reload();

                            } else {
                                toastr.warning('Something went wrong!', 'Warning');
                            }

                        },
                        error: function(response) {

                            toastr.error("Server connection failed", "Connection Error");

                        }
                    });
                }
            });

        });


	};

	return {
		// public functions
		init: function() {
			_demo();
		},
	};
}();

jQuery(document).ready(function() {
	KTAppsUsersListDatatable.init();
});
