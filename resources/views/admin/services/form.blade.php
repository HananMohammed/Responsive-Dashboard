 <!--begin::Form-->
    <div class="row" id="offersText">
        <div class="form-group form-group-last col-sm-12">
            <div class="alert alert-custom alert-default" role="alert">
                <div class="alert-icon">
                    <span class="svg-icon svg-icon-primary svg-icon-xl">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
                                <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                </div>
                <div class="alert-text"> Don't Forget To Add All Required Service input Which Contain <label class="text-danger">*</label> <lable class="text-primary">Symbol </lable> </div>
        </div>
            <div class="row">
                <div class="form-group col-md-5 col-sm-12">
                    <label>@lang('newservices.title_en') <label class="text-danger">*</label> </label>
                    <input type="text" name="name_en" id="name_en"  value=@if(!empty($newService))"{{$newService->name_en}}" @else"{{old('name_en')}}" @endif class="form-control"  placeholder="Enter Your English Name "/>
                    @if($errors->has('name_en'))
                        <span class="error">{{ $errors->get('name_en')[0] }}</span>
                    @endif

                </div>
                <div class="form-group col-md-5 col-sm-12">
                    <label>@lang('newservices.title_ar')<label class="text-danger">*</label> </label>
                    <input type="text" name="name_ar"value=@if(!empty($newService))"{{$newService->name_ar}}"@else"{{old('name_ar')}}"@endif class="form-control"  placeholder="Enter Your Arabic Name "/>
                    @if($errors->has('name-ar'))
                        <span class="error">{{ $errors->get('name-ar')[0] }}</span>
                    @endif

                </div>
            </div>
            <div class="form-group col-sm-10">
                <label>@lang('akwanoffers.slug_en') <label class="text-danger">*</label>  </label>
                <input type="text" name="slug_en" id="slug" value=@if(!empty($newService))"{{$newService->slug_en}}"@else"{{old('slug_en')}}"@endif class="form-control" placeholder="Enter English Slug ">
                @if($errors->has('slug_en'))
                    <span class="error">{{ $errors->get('slug_en')[0] }}</span>
                @endif
            </div>
            <div class="form-group col-sm-10">
                <label>@lang('newservices.text_en') <label class="text-danger">*</label>  </label>
                <textarea name="text_en" id="kt-ckeditor-1">
                    @if(!empty($newService)){{$newService->text_en}}@else{{old('text_en')}}@endif
                </textarea>
                @if($errors->has('text_en'))
                    <span class="error">{{ $errors->get('text_en')[0] }}</span>
                @endif
            </div>
            <div class="form-group col-sm-10">
                <label>@lang('newservices.text_en') <label class="text-danger">*</label> </label>
                <textarea name="text_ar" id="kt-ckeditor-2">
                     @if(!empty($newService)){{$newService->text_ar}}@else{{old('text_ar')}}@endif
                </textarea>
                @if($errors->has('text_ar'))
                    <span class="error">{{ $errors->get('text_ar')[0] }}</span>
                @endif
            </div>
            <div class="form-group  col-sm-10">
                <label>@lang('newservices.words_en')<label class="text-danger">*</label> </label>
                <textarea name="sluginput_en"  id="kt-ckeditor-3" >
                    @if(!empty($newService)) {{$newService->sluginput_en}} @else{{old('sluginput_en')}} @endif
                </textarea>
                @if($errors->has('sluginput_en'))
                    <span class="error">{{ $errors->get('sluginput_en')[0] }}</span>
                @endif

            </div>
            <div class="form-group  col-sm-10">
                <label>@lang('newservices.words_ar')<label class="text-danger">*</label> </label>
                <textarea type="text" name="sluginput_ar" id="kt-ckeditor-4">
                    @if(!empty($newService)) {{$newService->sluginput_ar}} @else{{old('sluginput_ar')}} @endif
                </textarea>
                @if($errors->has('sluginput_ar'))
                    <span class="error">{{ $errors->get('sluginput_ar')[0] }}</span>
                @endif

            </div>
            <div class="row">
                <div class="form-group col-lg-4 col-md-9 col-sm-12 text-lg-left" >
                    <label class="col-form-label" >@lang('akwanoffers.images' )<label class="text-danger">*</label> </label>
                    <div style="width:80%;height: auto;">
                        <label for="upload-photo" cursor="pointer">
                            <div class="dropzone dropzone-default">
                                @if(empty($newService))
                                    <div class="dropzone-msg dz-message">
                                        <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                        <span class="dropzone-msg-desc">This is just a demo dropzone. Selected files are
                        <strong>not</strong>actually uploaded.</span>
                                    </div>
                                    <img id="output" width="200" height="150px" style="border-radius: 2%;display: none" />
                                @else
                                    <img id="output" width="200" height="150px" src="{{asset_public('image/'.$newService->images)}}" style="border-radius: 2%;" />
                                @endif
                            </div>
                        </label>
                        <input type="file" name="images" id="upload-photo" hidden >
                        @if($errors->has('images'))
                            <span class="error">{{ $errors->get('images')[0] }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-lg-4 col-md-9 col-sm-12" type="file" name="single_images">
                    <label class="col-form-label text-lg-left">@lang('akwanoffers.single_image')<label class="text-danger">*</label>  </label>
                    <div  style="width:80%;height: auto;">
                        <label for="upload-single-photo" style="cursor: pointer;" >
                            <div class="dropzone dropzone-default">
                                @if( empty($newService) )
                                    <div class="dropzone-msg2 dz-message">
                                        <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                        <span class="dropzone-msg-desc">This is just a demo dropzone. Selected files are
                        <strong>not</strong>actually uploaded.</span>
                                    </div>
                                    <img id="outputSingleImage" width="200" height="150px" style="border-radius: 2%;display: none" />
                                @else
                                    <img id="outputSingleImage" width="200" src="{{asset_public('image/'.$newService->single_images)}}"  height="150px" style="border-radius: 2%;" />
                                @endif
                            </div>
                        </label>
                        <input type="file"  name="single_images" id="upload-single-photo" hidden>
                        @if($errors->has('single_image'))
                            <span class="error">{{ $errors->get('single_images')[0] }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-lg-4 col-md-9 col-sm-12" type="file" name="logo">
                    <label class="col-form-label text-lg-left">@lang('newservices.logo') <label class="text-danger">*</label>  </label>
                    <div  style="width:80%;height: auto;">
                        <label for="logo" style="cursor: pointer;" >
                            <div class="dropzone dropzone-default">
                                @if( empty($newService) )
                                    <div class="dropzone-msg3 dz-message">
                                        <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                        <span class="dropzone-msg-desc">This is just a demo dropzone. Selected files are
                        <strong>not</strong>actually uploaded.</span>
                                    </div>
                                    <img id="outputLogoImage" width="200" height="150px" style="border-radius: 2%;display: none" />
                                @else
                                    <img id="outputLogoImage" width="200" src="{{asset_public('image/'.$newService->logo)}}"  height="150px" style="border-radius: 2%;" />
                                @endif
                            </div>
                        </label>
                        <input type="file"  name="logo" id="logo"  hidden>
                        @if($errors->has('logo'))
                            <span class="error">{{ $errors->get('logo')[0] }}</span>
                        @endif
                    </div>
                </div>
            </div>
            @include('admin.services.seo.index')
        </div>
    <div class="card-footer col-sm-12 ">
        <input type="submit" id="submit" class="btn btn-primary mr-2" value="Add Service">
        <button type="reset" class="btn btn-secondary"><a href="{{route('admin.new-services.index')}}">Cancel</a> </button>
    </div>

    </div>
<!--end::Form-->
@section('footer-js')
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{asset_public('adminPanel/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>
    <!--end::Page Vendors-->
<script>
// $( 'textarea' ).ckeditor();
$(document).ready( function() {
    $("#upload-photo").on('change' , function () {
        var image = document.getElementById('output');
        $(".dropzone-msg").remove()
        image.src = URL.createObjectURL(event.target.files[0]);
        $("#output").css('display','block')
    })

     $("#upload-single-photo").on('change' , function () {
         var image = document.getElementById('outputSingleImage');
         $(".dropzone-msg2").remove()
         image.src = URL.createObjectURL(event.target.files[0]);
         $("#outputSingleImage").css('display','block')
     })
    $("#logo").on('change' , function () {
        var image = document.getElementById('outputLogoImage');
        $(".dropzone-msg3").remove()
        image.src = URL.createObjectURL(event.target.files[0]);
        $("#outputLogoImage").css('display','block')
    })
})
var KTCkeditor1 = function () {
    // Private functions
    var demos1 = function () {
        ClassicEditor.create( document.querySelector( '#kt-ckeditor-1' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    }
    var demos2 = function () {
        ClassicEditor.create( document.querySelector( '#kt-ckeditor-2' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    }
    var demos3 = function () {
        ClassicEditor.create( document.querySelector( '#kt-ckeditor-3' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    }
    var demos4 = function () {
        ClassicEditor.create( document.querySelector( '#kt-ckeditor-4' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    }
    return {
        // public functions
        init: function() {
            demos1();
            demos2();
            demos3();
            demos4();
        }
    };
}();


// Initialization
jQuery(document).ready(function() {
    KTCkeditor1.init();
});
//////////////////////Slug ///////////////////////

$('#name_en').change(function(e){
    //e.preventDefault()
    $.get(
        '{{route('admin.check-slug')}}',
        {'name_en' : $(this).val()},
        function (data) {
            $('#slug').val(data.slug)
        }
    );
});

//////////////////////End Slug ///////////////////////
</script>
@endsection
