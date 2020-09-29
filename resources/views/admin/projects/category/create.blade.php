@extends('admin.layouts.app')

@section('title', 'Add New Project')

@section('header-css')
<style>
.image-area {
  position: relative;
  width: 50%;
}
.image-area img{
  max-width: 100%;
  height: auto;
}
.remove-image {
display: none;
position: absolute;
top: -10px;
right: -10px;
border-radius: 10em;
padding: 2px 6px 3px;
text-decoration: none;
font: 700 21px/20px sans-serif;
background: #555;
border: 3px solid #fff;
color: #FFF;
box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 2px 4px rgba(0,0,0,0.3);
  text-shadow: 0 1px 2px rgba(0,0,0,0.5);
  -webkit-transition: background 0.5s;
  transition: background 0.5s;
}
.remove-image:hover {
 background: #E54E4E;
  padding: 3px 7px 5px;
  top: -11px;
right: -11px;
}
.remove-image:active {
 background: #E54E4E;
  top: -10px;
right: -11px;
}
</style>
@endsection

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold my-1 mr-5">List Decisions</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="/dashboard" class="text-muted">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/services" class="text-muted">Decisions</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/services/create" class="text-muted">Create Decisions</a>
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
            @if($errors->any())
                <div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
                    <div class="alert-icon">
                        <span class="svg-icon svg-icon-primary svg-icon-xl">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3"></path>
                                    <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                    <div class="alert-text">
                        {{$errors->first()}}
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Projects Category Form</h3>
                        </div>
                        <!--begin::Form-->
                        <form action="{{ route('admin.projects-category.store') }}" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                @include('admin.projects.category.form')
                            </div>
                            <div class="card-footer">
                                @can('create')
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                @endcan
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection

@section('footer-js')
<script type="text/javascript">
{{--$( document ).ready(function() {--}}

{{--    var arrows;--}}
{{--    if (KTUtil.isRTL()) {--}}
{{--        arrows = {--}}
{{--            leftArrow: '<i class="la la-angle-right"></i>',--}}
{{--            rightArrow: '<i class="la la-angle-left"></i>'--}}
{{--        }--}}
{{--    } else {--}}
{{--        arrows = {--}}
{{--            leftArrow: '<i class="la la-angle-left"></i>',--}}
{{--            rightArrow: '<i class="la la-angle-right"></i>'--}}
{{--        }--}}
{{--    }--}}

{{--    // default time--}}
{{--    $('.kt_timepicker_3').timepicker({--}}
{{--        defaultTime: '11:45:20',--}}
{{--        minuteStep: 1,--}}
{{--        showSeconds: true,--}}
{{--        showMeridian: false--}}
{{--    });--}}

{{--    // enable clear button--}}
{{--    $('.kt_datepicker_3').datepicker({--}}
{{--        rtl: KTUtil.isRTL(),--}}
{{--        todayBtn: "linked",--}}
{{--        clearBtn: true,--}}
{{--        todayHighlight: true,--}}
{{--        templates: arrows--}}
{{--    });--}}

{{--    // multiple file upload--}}
{{--    $('#kt_dropzone_2').dropzone({--}}
{{--    url: "{{ route('image.store') }}", // Set the url for your upload script location--}}
{{--    paramName: "file", // The name that will be used to transfer the file--}}
{{--    maxFiles: 10,--}}
{{--    maxFilesize: 10, // MB--}}
{{--    acceptedFiles: ".jpeg,.jpg,.png,.gif",--}}
{{--    addRemoveLinks: true,--}}
{{--    // uploadMultiple: true,--}}
{{--    accept: function(file, done) {--}}
{{--        if (file.name == "justinbieber.jpg") {--}}
{{--            done("Naha, you don't.");--}}
{{--        } else {--}}
{{--            done();--}}
{{--        }--}}
{{--    },--}}
{{--    removedfile: function(file)--}}
{{--            {--}}
{{--                var name = file.upload.filename;--}}
{{--                $.ajax({--}}
{{--                    headers: {--}}
{{--                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')--}}
{{--                            },--}}
{{--                    type: 'POST',--}}
{{--                    url: '{{ url("dropzone-image-delete") }}',--}}
{{--                    data: {filename: name},--}}
{{--                    success: function (data){--}}
{{--                        console.log("File deleted successfully!!");--}}
{{--                    },--}}
{{--                    error: function(e) {--}}
{{--                        console.log(e);--}}
{{--                    }});--}}
{{--                    var fileRef;--}}
{{--                    return (fileRef = file.previewElement) != null ?--}}
{{--                    fileRef.parentNode.removeChild(file.previewElement) : void 0;--}}
{{--            },--}}
{{--    success: function(file, response)--}}
{{--    {--}}
{{--        if(response.status){--}}
{{--            let valDecisionImages = $("#name-decision-images").val()--}}
{{--            var img = ""--}}
{{--            if(valDecisionImages.length == 0){--}}
{{--                img = response["img"]--}}
{{--            }else{--}}
{{--                img = valDecisionImages + ", " + response["img"]--}}
{{--            }--}}
{{--            $("#name-decision-images").val(img);--}}
{{--        }--}}

{{--    },--}}
{{--    });--}}
{{--});--}}
</script>
@endsection

