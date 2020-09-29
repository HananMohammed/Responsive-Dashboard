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
                <div class="form-group col-lg-5 m-auto col-md-9 col-sm-12 text-lg-left" >
                    <label class="col-form-label" >Upload Employee Image<label class="text-danger">*</label> </label>
                    <div style="width:80%;height: auto;border-radius: 50%!important;">
                        <label for="upload-photo" cursor="pointer">
                            <div class="dropzone dropzone-default">
                                @if($employee->first()->count() === 1)
                                    <div class="dropzone-msg dz-message">
                                        <h3 class="dropzone-msg-title">Drop images here or click to upload.</h3>
                                        <span class="dropzone-msg-desc">This a demo dropzone. Selected Employee are
                                          <strong>not</strong>actually uploaded.</span>
                                    </div>
                                    <img id="output" width="200" height="150px" style="border-radius: 2%;display: none" />
                                @else
                                    <img id="output" width="200" height="150px" src="{{asset_public('image/'.$employee->profile_photo_path)}}" style="border-radius: 2%;" />
                                @endif
                            </div>
                        </label>
                        @can('create')
                        <input type="file" name="profile_photo_path" id="upload-photo" hidden >
                        @endcan
                        @if($errors->has('images'))
                            <span class="error">{{ $errors->get('images')[0] }}</span>
                        @endif
                    </div>
                </div>


                <div class="form-group col-md-10 col-sm-12">
                    <label>Name <label class="text-danger">*</label> </label>
                    <input type="text" name="name" id="name"  value= "{{old('name') ?? $employee->name}}" class="form-control form-control-lg"  placeholder="Enter Employee Name "/>
                    @if($errors->has('name'))
                        <span class="error">{{ $errors->get('name')[0] }}</span>
                    @endif
                </div>
                <div class="form-group col-md-10 col-sm-12">
                    <label>Email address <span class="text-danger">*</span></label>
                    <input type="email" name ="email" value="{{old('email') ?? $employee->email}}" class="form-control form-control-lg" placeholder="Enter Employee Email">
                     @if($errors->has('email'))
                        <span class="error">{{ $errors->get('email')[0] }}</span>
                    @endif
                </div>
                <div class="form-group col-md-10 col-sm-12">
                    <label>Password <span class="text-danger">*</span></label>
                    <input type="password" name ="password" value="{{old('password')}}" class="form-control form-control-lg" placeholder="***************">
                     @if($errors->has('password'))
                        <span class="error">{{ $errors->get('password')[0] }}</span>
                    @endif
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="exampleSelect2" >Select Employee Role <span class="text-danger">*</span></label>
                    <select multiple="" class="form-control" name ="role[]" id="exampleSelect2">
                        @foreach($roles as $role )
                        <option  value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>

        </div>
    <div class="card-footer col-sm-12 ">
        <input type="submit" id="submit" class="btn btn-primary mr-2" value="Add Employee">
        <button type="reset" class="btn btn-secondary"><a href="{{route('admin.employees.index')}}">Cancel</a> </button>
    </div>

    </div>
<!--end::Form-->
@section('footer-js')
    <!--begin::Page Vendors(used by this page)-->
<script src="{{asset_public('adminPanel/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>
    <!--end::Page Vendors-->
<script src="{{asset_public('adminPanel/assets/js/pages/features/miscellaneous/dual-listbox.js')}}"></script>
<script>
    $("#upload-photo").on('change' , function () {
        var image = document.getElementById('output');
        $(".dropzone-msg").remove()
        image.src = URL.createObjectURL(event.target.files[0]);
        $("#output").css('display','block')
    })

</script>
@endsection
