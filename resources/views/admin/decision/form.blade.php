
<div class="form-group">
    <label for="name">Title Ar</label>
    <input type="text" class="form-control" id="title_ar" placeholder="Enter name" name="title_ar" value="{{ old('title_ar') ?? $decision->translations->where('lang_code', 'ar')->first()['title'] }}">
    <div>{{ $errors->first('title_ar') }}</div>
</div>
<div class="form-group">
    <label for="name">Title En</label>
    <input type="text" class="form-control" id="title_en" placeholder="Enter name" name="title_en" value="{{ old('title_en') ?? $decision->title_en }}">
    <div>{{ $errors->first('title_en') }}</div>
</div>

<div class="form-group">
    <label for="name">Link</label>
    <input type="text" class="form-control" id="link" placeholder="Enter link" name="link" value="{{ old('link') ?? $decision->translations->where('lang_code', 'en')->first()['title'] }}">
    <div>{{ $errors->first('link') }}</div>
</div>

<div class="form-group row">
    <label for="category_id" class="col-form-label text-right col-lg-2 col-sm-12">Categories</label>
    <div class="col-lg-4 col-md-9 col-sm-12">
        <select class="form-control" id="category_id" name="category_id">
            <option value="" disabled>Select one</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $category->category_id ? 'selected' : '' }}>{{ $category->translations->first()['name'] }}</option>
            @endforeach
        </select>
    </div>
    <label for="parent_id" class="col-form-label text-right col-lg-2 col-sm-12">Related Decisions</label>
    <div class="col-lg-4 col-md-9 col-sm-12">
        <select class="form-control" id="parent_id" name="parent_id">
            <option value="" disabled>Select one</option>
            @foreach ($relateddecisions as $related)
                <option value="{{ $related->id }}" {{ $related->id == $decision->parent_id ? 'selected' : '' }}>{{ $related->translations->first()['title'] }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="emirate" class="col-form-label text-right col-lg-2 col-sm-12">Emirate</label>
    <div class="col-lg-4 col-md-9 col-sm-12">
        <select class="form-control" id="emirate" name="emirate">
            <option value="" disabled>Select one</option>
            <option value="DUBAI , دبي" {{ $decision->emirate == "DUBAI , دبي" ? 'selected' : '' }}>DUBAI , دبي</option>
            <option value="SHARJAH , الشارقه" {{ $decision->emirate == "SHARJAH , الشارقه" ? 'selected' : '' }}> SHARJAH , الشارقه</option>
            <option value="AJMAN , عجمان" {{ $decision->emirate == "AJMAN , عجمان" ? 'selected' : '' }}> AJMAN , عجمان</option>
            <option vaue="ABU_DHABI , ابو ظبي" {{ $decision->emirate == "ABU_DHABI , ابو ظبي" ? 'selected' : '' }}> ABU_DHABI  , ابو ظبي</option>
            <option vaue="FUJAIRAH ,  الفجيرة" {{ $decision->emirate == "FUJAIRAH ,  الفجيرة" ? 'selected' : '' }}>  FUJAIRAH ,  الفجيرة</option>
            <option vaue="RAS_AL_KHAIMAH  , رأس الخيمه" {{ $decision->emirate == "RAS_AL_KHAIMAH  , رأس الخيمه" ? 'selected' : '' }}> RAS_AL_KHAIMAH  ,  رأس الخيمه</option>
            <option vaue="UMM_AL_QUAIWAIN ,  ام القيوين" {{ $decision->emirate == "UMM_AL_QUAIWAIN ,  ام القيوين" ? 'selected' : '' }}> UMM_AL_QUAIWAIN  ,  ام القيوين</option>
        </select>
    </div>
</div>



<div class="form-group row">
    <label class="col-form-label text-right col-lg-2 col-sm-12">Start Date</label>
    <div class="col-lg-4 col-md-9 col-sm-12">
        <div class="input-group date">
            <input type="text" class="form-control kt_datepicker_3" name="start_date" readonly="readonly" value="{{ old('start_date') ?? $decision->start_date }}" id="start_date">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="la la-calendar"></i>
                </span>
            </div>
        </div>
    </div>
    <label class="col-form-label text-right col-lg-2 col-sm-12">Execution Date</label>
    <div class="col-lg-4 col-md-9 col-sm-12">
        <div class="input-group date">
            <input type="text" class="form-control kt_datepicker_3" name="execution_date" readonly="readonly" value="{{ old('execution_date') ?? $decision->execution_date }}" id="execution_date">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="la la-calendar"></i>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label text-right col-lg-2 col-sm-12">Start Time</label>
    <div class="col-lg-4 col-md-9 col-sm-12">
        <div class="input-group timepicker">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="la la-clock-o"></i>
                </span>
            </div>
            <input class="form-control kt_timepicker_3" value="{{ old('start_time') ?? $decision->start_time }}" name="start_time" id="start_time" readonly="readonly" placeholder="Select time" type="text">
        </div>
    </div>
    <label class="col-form-label text-right col-lg-2 col-sm-12">End Time</label>
    <div class="col-lg-4 col-md-9 col-sm-12">
        <div class="input-group timepicker">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="la la-clock-o"></i>
                </span>
            </div>
            <input class="form-control kt_timepicker_3" name="end_time" id="end_time" value="{{ old('end_time') ?? $decision->end_time }}" readonly="readonly" placeholder="Select time" type="text">
        </div>
    </div>
</div>

<div class="form-group mb-1">
    <label for="description_ar">Description Ar</label>
    <textarea class="form-control" name="description_ar" id="description_ar" rows="3">{{ old('description_ar') ?? $decision->translations->where('lang_code', 'ar')->first()['description'] }}</textarea>
</div>

<div class="form-group mb-5">
    <label for="description_en">Description en</label>
    <textarea class="form-control" name="description_en" id="description_en" rows="3">{{ old('description_en') ?? $decision->translations->where('lang_code', 'ar')->first()['description'] }}</textarea>
</div>

@if($images->isNotEmpty())
    <div class="form-group row">
        @foreach($images as $image)
            <div class="image-area col-2">
                <img src="{{ url($image->image) }}"  alt="" >
                <a href="{{ route('assets.image.destroy' , [$image] ) }}" class="remove-image" style="display: inline;">
                    &#215;
                </a>
            </div>
        @endforeach
    </div>
@endif

<div class="form-group row">
    <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Upload Decision Image</label>
    <div class="col-lg-4 col-md-9 col-sm-12">
        <div class="dropzone dropzone-default dropzone-primary" id="kt_dropzone_2">
            <div class="dropzone-msg dz-message needsclick">
                <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                <span class="dropzone-msg-desc">Upload up to 10 files</span>
            </div>
        </div>
    </div>
    <input type="hidden" name="decision_images" class="custom-file-input" id="name-decision-images" />

</div>
<div class="form-group row">
    <label class="col-2 col-form-label">Status</label>
    <div class="col-2">
        <span class="switch switch-outline switch-icon switch-success">
            <label>
                <input type="checkbox" {{ $decision->status ? 'checked' : '' }} name="status">
                <span></span>
            </label>
        </span>
    </div>
    <label class="col-2 col-form-label">Pin</label>
    <div class="col-2">
        <span class="switch switch-outline switch-icon switch-info">
            <label>
                <input type="checkbox" {{ $decision->pin ? 'checked' : '' }} name="pin">
                <span></span>
            </label>
        </span>
    </div>
    <label class="col-2 col-form-label">Recommend</label>
    <div class="col-2">
        <span class="switch switch-outline switch-icon switch-info">
            <label>
                <input type="checkbox" {{ $decision->recommend ? 'checked' : '' }} name="recommend">
                <span></span>
            </label>
        </span>
    </div>
</div>
@csrf
