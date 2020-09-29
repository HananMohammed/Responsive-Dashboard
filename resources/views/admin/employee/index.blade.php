@extends('admin.layouts.app')

@section('title', 'Offers')

@section('content')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">List Employees</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.home')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.employees.index')}}" class="text-muted">Employee</a>
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
                        <h3 class="card-label">Employee Table</h3>
                    </div>
                    @can('create')
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ route('admin.employees.create') }}" class="btn btn-primary font-weight-bolder">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                                <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>New employee</a>
                        <!--end::Button-->
                    </div>
                    @endcan
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-checkable " id="kt_datatable">
                                    <thead>
                                    <tr role="row">
                                        <th>ID</th>
                                        <th>Employee Image</th>
                                        <th>Employee Name</th>
                                        <th>Employee Email</th>
                                        <th>Create.Date</th>
                                        <th>Update.Date</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    @if(count($employees)>0)
                                    <tbody>
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td>{{$employee->id}}</td>
                                            <td>
                                                <img id="output" width="50" height="50px" src="{{asset_public('image/'.$employee->profile_photo_path)}}" style="border-radius:40%;" />
                                            </td>
                                            <td>{{$employee->name}}</td>
                                            <td>{{$employee->email}}</td>
                                            <td>{{ $employee->created_at }}</td>
                                            <td>{{ $employee->updated_at }}</td>
                                            <td nowrap="nowrap">{{ $employee->id }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    @endif
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
     <script src="{{ asset_public('adminPanel/plugins/custom/datatables/datatables.bundle.js') }}"></script>
     <script type="text/javascript">
 $( document ).ready(function() {

// begin first table
    var table = $('#kt_datatable');
    console.log(table);
    table.DataTable({
        responsive: true,
        retrieve: true,
        paging: true,
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
                title: 'ID',
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
            {
                targets: -1,
                title: 'Actions',
                orderable: false,
                width: '125px',
                render: function(data, type, full, meta) {
                    return `
                    @can('edit')
                    <a href="{{route('admin.employees.index')}}/${data}/edit" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
                    <span class="svg-icon svg-icon-md">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                        </g>
                    </svg>
                </span>
            </a>
            @endcan
            @can('delete')
            <a href="/admin/employees/${data}" class="btn btn-sm btn-clean btn-icon" title="Delete" onclick="event.preventDefault();
                        document.getElementById('delete-operator-form-${data}').submit();">
                <span class="svg-icon svg-icon-md">
                    <svg class="delete" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                            <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                        </g>
                    </svg>
                </span>
                <form id="delete-operator-form-${data}" action="/en/admin/employees/${data}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                    </form>
                </a>
                @endcan
                `;
                },
            },
            {
                targets: 2,
                title:'Offer Status' ,
                width: '75px',
                render: function(data, type, full, meta) {
                    var status = {
                        0: {'title': 'No', 'class': ' label-light-danger'},
                        1: {'title': 'Yes', 'class': ' label-light-primary'},
                    };
                    if (typeof status[data] === 'undefined') {
                        return data;
                    }
                    return '<span class="label label-lg font-weight-bold' + status[data].class + ' label-inline">' + status[data].title + '</span>';
                },
            },
        ],
    });

/////////////offer Status ////////////////

 $(function() {
     $('.toggle-class').change(function() {
         var offer_status = $(this).prop('checked') == true ? 1 : 0;
         var id = $(this).data('id');
         $.ajax({
             type: "GET",
             dataType: "json",
             url: '{{route('admin.offerStatus')}}',
             data: {'offer_status': offer_status, 'id': id },
             success: function(data){
                 console.log(data.success)
             }
         });
     })
 })


//////////////////////////////////////////
});
    </script>
@endsection
