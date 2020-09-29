<!--***************************title -description -keyword****************************************-->
<div class="row">
    <div class="form-group col-md-5 col-sm-12">
        <label>@lang('seo.desceng')</label>
        <input type="text" name="seo_description_en" value= "{{old('seo_description_en') ?? $projects->seo_description_en }}" class="form-control"  placeholder="Enter English Seo Description "/>
        @error('seo_description_en')
        <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group col-md-5 col-sm-12">
        <label>@lang('seo.descar')</label>
        <input type="text" name="seo_description_ar" value= "{{old('seo_description_ar') ??$projects->seo_description_ar}}" class="form-control"  placeholder="Enter Arabic Seo Description "/>
        @error('seo_description_ar')
        <span class="error">{{ $message}}</span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="form-group col-md-5 col-sm-12">
        <label>@lang('seo.keywordeng')</label>
        <input type="text" name="seo_keyword_en" value= "{{old('seo_keyword_en') ?? $projects->seo_keyword_en}}" class="form-control"  placeholder="Enter English Seo keyword "/>
        @error('seo_keyword_en')
        <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group col-md-5 col-sm-12">
        <label>@lang('seo.keywordar')</label>
        <input type="text" name="seo_keyword_ar" value= "{{old('seo_keyword_ar')?? $projects->seo_keyword_ar}}" class="form-control"  placeholder="Enter Arabic Seo keyword "/>
        @error('seo_keyword_ar')
        <span class="error">{{ $message}}</span>
        @enderror
    </div>
</div>
<!-- **********end title -description -keyword********************************************-->
