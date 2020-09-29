<div class="row">
    <div class=" col-md-5 col-sm-12">
        <div class="form-group">
            <label for="name">Title En <label class="text-danger">*</label> </label>
            <input type="text" class="form-control" id="title_en" placeholder="Enter name" name="proj_name_en" value="{{$projects->proj_name_en }}">
            <div>{{ $errors->first('proj_name_en') }}</div>
        </div>
    </div>

    <div class=" col-md-5 col-sm-12">
        <div class="form-group">
            <label for="name">Title ar <label class="text-danger">*</label> </label>
            <input type="text" class="form-control" id="title_en" placeholder="Enter name" name="proj_name_ar" value="{{ old('proj_name_ar') ?? $projects->proj_name_ar }}">
            <div>{{ $errors->first('proj_name_ar') }}</div>
        </div>
    </div>

    <div class=" col-md-5 col-sm-12">
        <div class="form-group">
            <label for="name">Link <label class="text-danger">*</label> </label>
            <input type="text" class="form-control" id="link" placeholder="Enter link" name="link" value="{{ old('link') ?? $projects->link }}">
            <div>{{ $errors->first('link') }}</div>
        </div>
    </div>

    <div class=" col-md-5 col-sm-12">
        <label for="category_id">Categories <label class="text-danger">*</label> </label>
        <select class="form-control" id="category_id" name="category_id">
            <option value="" disabled>Select category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" >{{ $category-> name_en}}</option>
            @endforeach
        </select>
    </div>

    <div class=" col-md-10 col-sm-12" type="file" name="images">
        <div class="form-group">
        @if($projects->exists && !empty($projects->images))
        <form  action="{{ route('admin.imageDelete' ,$projects->id) }}" enctype="multipart/form-data" id="myForm" name="myForm">
             {!! csrf_field() !!}
             {{method_field('PUT')}}
            <input id="token_field" name="_token" type="hidden" value="{{csrf_token()}}">
            <label for="name">@lang('project.images' ) <label class="text-danger">*</label> </label>
            <div class="row" data-recordid = "{{$projects->id}}" id ="recordId">
            @foreach(json_decode($projects->images , true) as $image)
                <div class="col-sm-2 imgUp" data-image = "{{$image}}" data-imagid="{{$loop->index}}" >
                    <div class="imagePreview" style="background:url('{{asset_public('image/'.$image)}}') ;background-size: cover;"></div>
                    <label class="btn btn-primary">
                        Upload<input type="file" class="uploadFile img" name="images[]" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                    </label>
                    <i class="fa fa-times del"></i>
                </div><!-- col-2 -->
                @if($loop->last)
                <i class="fa fa-plus imgAdd"></i>
                @endif
                    <input type="file"  name="images[]" id="upload-photo"  multiple   onchange="loadFile(event)" hidden>
            @endforeach
            </div><!-- row -->

            @if($errors->has('images'))
                <span class="error">{{ $errors->get('images') }}</span>
            @endif
        </form>
        @else
                <label for="name">@lang('project.images' ) <label class="text-danger">*</label> </label>
                <div class="row">
                    <div class="col-sm-2 imgUp">
                        <div class="imagePreview"></div>
                        <label class="btn btn-primary">
                            Upload<input type="file" class="uploadFile img" name="images[]" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                        </label>
                    </div><!-- col-2 -->
                    <i class="fa fa-plus imgAdd"></i>
                </div><!-- row -->
                <input type="file"  name="images[]" id="upload-photo"  multiple   onchange="loadFile(event)" hidden>

                @if($errors->has('images'))
                    <span class="error">{{ $errors->get('images') }}</span>
                @endif
        @endif
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
    @include('admin.projects.seo.index')
    </div>
    <div class="card-footer col-md-12 " >
        @can('create')
        <input type="submit" id="submit" class="btn btn-primary" value="Add Offer"  style="display: unset; border-radius:15%">
        @endcan
        <a href="{{route('admin.projects.index')}}" class="btn btn-secondary">Cancel</a>
    </div>
</div>


