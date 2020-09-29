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
                <div class="alert-text"> Don't Forget To Add All Required offer input Which Contain <label class="text-danger">*</label> <lable class="text-primary">Symbol </lable> </div>
        </div>
            <div class="row">
                <input type="number" value="1" name="offer_status" hidden>
                <div class="form-group col-md-5 col-sm-12">
                    <label>@lang('newservices.title_en') <label class="text-danger">*</label> </label>
                    <input type="text" name="name_en" id="name_en"  value=@if(!empty($creativeService))"{{$creativeService->name_en}}" @else"{{old('name_en')}}" @endif class="form-control"  placeholder="Enter Your English Name "/>
                    @if($errors->has('name_en'))
                        <span class="error">{{ $errors->get('name_en')[0] }}</span>
                    @endif

                </div>
                <div class="form-group col-md-5 col-sm-12">
                    <label>@lang('newservices.title_ar')<label class="text-danger">*</label> </label>
                    <input type="text" name="name_ar"value=@if(!empty($creativeService))"{{$creativeService->name_ar}}"@else"{{old('name_ar')}}"@endif class="form-control"  placeholder="Enter Your Arabic Name "/>
                    @if($errors->has('name-ar'))
                        <span class="error">{{ $errors->get('name-ar')[0] }}</span>
                    @endif

                </div>
            </div>

            <div class="form-group col-sm-10">
                <label>@lang('newservices.text_en') <label class="text-danger">*</label>  </label>
                <textarea name="text_en" id="kt-ckeditor-1">
                    @if(!empty($creativeService)){{$creativeService->text_en}}@else{{old('text_en')}}@endif
                </textarea>
                @if($errors->has('text_en'))
                    <span class="error">{{ $errors->get('text_en')[0] }}</span>
                @endif
            </div>
            <div class="form-group col-sm-10">
                <label>@lang('newservices.text_en') <label class="text-danger">*</label> </label>
                <textarea name="text_ar" id="kt-ckeditor-2">
                     @if(!empty($creativeService)){{$creativeService->text_ar}}@else{{old('text_ar')}}@endif
                </textarea>
                @if($errors->has('text_ar'))
                    <span class="error">{{ $errors->get('text_ar')[0] }}</span>
                @endif
            </div>
        </div>
    <div class="card-footer col-sm-12 ">
        <input type="submit" id="submit" class="btn btn-primary mr-2" value="Add">
        <button type="reset" class="btn btn-secondary"><a href="{{route('admin.creative_service.index')}}">Cancel</a> </button>
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

    return {
        // public functions
        init: function() {
            demos1();
            demos2();
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
