<!--***************************title -description -keyword****************************************-->
<div class="row">
    <div class="form-group col-md-5 col-sm-12">
        <label>@lang('seo.titleeng')</label>
        <input type="text" name="seo_title_en" value=@if(!empty($newService))"{{$newService->seo_title_en}}"@else"{{old('seo_title_en')}}"@endif class="form-control"  placeholder="Enter English Seo Title "/>
        @error('seo_title_en')
        <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group col-md-5 col-sm-12">
        <label>@lang('seo.titlear')</label>
        <input type="text" name="seo_title_ar" value=@if(!empty($newService))"{{$newService->seo_title_ar}}"@else"{{old('seo_title_ar')}}"@endif class="form-control"  placeholder="Enter Arabic Seo title "/>
        @error('seo_title_ar')
        <span class="error">{{ $message}}</span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="form-group col-md-5 col-sm-12">
        <label>@lang('seo.desceng')</label>
        <input type="text" name="seo_description_en" value=@if(!empty($newService))"{{$newService->seo_description_en}}"@else"{{old('seo_description_en')}}"@endif class="form-control"  placeholder="Enter English Seo Description "/>
        @error('seo_description_en')
        <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group col-md-5 col-sm-12">
        <label>@lang('seo.descar')</label>
        <input type="text" name="seo_description_ar" value=@if(!empty($newService))"{{$newService->seo_description_ar}}"@else"{{old('seo_description_ar')}}" @endif class="form-control"  placeholder="Enter Arabic Seo Description "/>
        @error('seo_description_ar')
        <span class="error">{{ $message}}</span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="form-group col-md-5 col-sm-12">
        <label>@lang('seo.keywordeng')</label>
        <input type="text" name="seo_keyword_en" value=@if(!empty($newService))"{{$newService->seo_keyword_en}}"@else"{{old('seo_keyword_en')}}" @endif class="form-control"  placeholder="Enter English Seo keyword "/>
        @error('seo_keyword_en')
        <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group col-md-5 col-sm-12">
        <label>@lang('seo.keywordar')</label>
        <input type="text" name="seo_keyword_ar" value=@if(!empty($newService))"{{$newService->seo_keyword_ar}}"@else"{{old('seo_keyword_ar')}}" @endif class="form-control"  placeholder="Enter Arabic Seo keyword "/>
        @error('seo_keyword_ar')
        <span class="error">{{ $message}}</span>
        @enderror
    </div>
</div>
<!-- **********end title -description -keyword********************************************-->
