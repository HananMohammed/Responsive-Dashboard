@extends('admin.layouts.app')

@section('title', ' mails')

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
                        <li class="breadcrumb-item">
                            <a href="#" class="text-muted">mail deatils</a>
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
                            @foreach($landingForms as $landingForm)
                                <div class="col-12 text-center text-white">
                                    <h3 class="py-2 mb-0  bg-dark">
                                        @if($landingForm->utm_source == 'facebook')
                                            @lang('akwancontact.fb') :
                                        @elseif($landingForm->utm_source == 'google')
                                            @lang('akwancontact.google') :
                                        @else
                                            @lang('akwancontact.name') : {{$landingForm->name}}
                                        @endif
                                        {{$landingForm->utm_source}}
                                    </h3>
                                </div>
                            <div class="col-sm-12">

                                <table class="table table-bordered table-checkable" id="kt_datatable">
                                    <thead>
                                    <tr role="row">
                                        <th>#</th>
                                        <th>Data</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>@lang('akwancontact.name')</td>
                                            <td>{{$landingForm->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>@lang('akwancontact.email')</td>
                                            <td>{{$landingForm->email_address}}</td>
                                        </tr>
                                        <tr>
                                            <td>@lang('akwancontact.phone')</td>
                                            <td>{{$landingForm->phone_number}}</td>
                                        </tr>
                                        <tr>
                                            <td>@lang('akwancontact.service')</td>
                                            <td>{{$landingForm->service}}</td>
                                        </tr>
                                        <tr>
                                            <td>@lang('akwancontact.websiteUrl')</td>
                                            <td>{{$landingForm->websiteUrl}}</td>
                                        </tr>
                                        <tr>
                                            <td>@lang('akwancontact.instgramUrl')</td>
                                            <td>{{$landingForm->instgramUrl}}</td>
                                        </tr>
                                        <tr>
                                            <td>utm_source </td>
                                            <td>{{$landingForm->utm_source}}</td>
                                        </tr>
                                        <tr>
                                            <td>utm_medium</td>
                                            <td>{{$landingForm->utm_medium}}</td>
                                        </tr>
                                        <tr>
                                            <td>utm_campaign</td>
                                            <td>{{$landingForm->utm_campaign}}</td>
                                        </tr>
                                        <tr>
                                            <td>@lang('akwancontact.time')</td>
                                            <td>{{$landingForm->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <td>@lang('akwancontact.msg')</td>
                                            <td>{{$landingForm->message}}</td>
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

