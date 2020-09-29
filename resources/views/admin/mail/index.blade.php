@extends('admin.layouts.app')

@section('title', 'mails')

@section('content')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold my-1 mr-5">landingpage mails List</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="/dashboard" class="text-muted">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('assets.landingpage-mails.index')}}" class="text-muted">landingpage mails</a>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page Heading-->
        </div>
        <!--end::Info-->
    </div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h3 class="card-label">landingpage mails Table</h3>
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                        <table class="table table-bordered table-checkable" id="kt_datatable">
                                <thead>
                                    <tr role="row">
                                        <th>ID</th>
                                        <th>@lang('akwancontact.name')</th>
                                        <th>@lang('akwancontact.email')</th>
                                        <th>@lang('akwancontact.time')</th>
                                        <th>@lang('akwancontact.details')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($landingForms as $landingForm)
                                    <tr>
                                        <td>{{ $landingForm->id }}</td>
                                        <td>{{$landingForm->name}}</td>
                                        <td>{{$landingForm->email_address}}</td>
                                        <td>{{$landingForm->created_at}}</td>
                                        <td><a href="{{route('assets.landingpage-mails.show',[$landingForm->id])}}" >
                                                <i class="metismenu-icon fa fa-eye mx-auto" id="landing-icon"aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--end: Datatable-->
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
@endsection
@section('footer-js')
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ asset_public('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <!--end::Page Vendors-->
    <script src="{{ asset_public('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script type="text/javascript">
    $( document ).ready(function() {

var table = $('#kt_datatable');

// begin first table
table.DataTable({
    responsive: true,

    // DOM Layout settings
    dom: `<'row'<'col-sm-12'tr>>
    <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

    lengthMenu: [5, 10, 25, 50],

    pageLength: 10,

    language: {
        'lengthMenu': 'Display _MENU_',
    },

    // Order settings
    order: [[1, 'desc']],

    headerCallback: function(thead, data, start, end, display) {
        thead.getElementsByTagName('th')[0].innerHTML = `
            <label class="checkbox checkbox-single">
                <input type="checkbox" value="" class="group-checkable"/>
                <span></span>
            </label>`;
    },

    columnDefs: [
        {
            targets: 0,
            width: '30px',
            className: 'dt-left',
            orderable: false,
            render: function(data, type, full, meta) {
                return `
                <label class="checkbox checkbox-single">
                    <input type="checkbox" value="" class="checkable"/>
                    <span></span>
                </label>`;
            },
        },

        // {
        //     targets: 5,
        //     width: '75px',
        //     render: function(data, type, full, meta) {
        //         var status = {
        //             0: {'title': 'No', 'class': ' label-light-danger'},
        //             1: {'title': 'Yes', 'class': 'label-light-primary'},
        //         };
        //         if (typeof status[data] === 'undefined') {
        //             return data;
        //         }
        //         return '<span class="label label-lg font-weight-bold' + status[data].class + ' label-inline">' + status[data].title + '</span>';
        //     },
        // },
        //
        // {
        //     targets: 6,
        //     width: '75px',
        //     render: function(data, type, full, meta) {
        //         var status = {
        //             0: {'title': 'No', 'class': ' label-light-danger'},
        //             1: {'title': 'Yes', 'class': 'label-light-primary'},
        //         };
        //         if (typeof status[data] === 'undefined') {
        //             return data;
        //         }
        //         return '<span class="label label-lg font-weight-bold' + status[data].class + ' label-inline">' + status[data].title + '</span>';
        //     },
        // },

        // {
        //     targets: 9,
        //     width: '75px',
        //     render: function(data, type, full, meta) {
        //         var status = {
        //             1: {'title': 'Online', 'state': 'danger'},
        //             2: {'title': 'Retail', 'state': 'primary'},
        //             3: {'title': 'Direct', 'state': 'success'},
        //         };
        //         if (typeof status[data] === 'undefined') {
        //             return data;
        //         }
        //         return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
        //             '<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
        //     },
        // },
    ],
});
});
</script>
@endsection
