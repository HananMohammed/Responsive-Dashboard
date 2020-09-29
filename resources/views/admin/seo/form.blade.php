<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="title_en">Title En</label>
            <input type="text" class="form-control" id="title_en" placeholder="Enter English title" name="title_en" value="{{ old('title_en') ?? $seoData[0]->title_en }}">
            <div>{{ $errors->first('proj_name_en') }}</div>
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="title_ar">Title ar</label>
            <input type="text" class="form-control" id="title_ar" placeholder="Enter arabic title" name="title_ar" value="{{ old('title_ar') ?? $seoData[0]->title_ar }}">
            <div>{{ $errors->first('title_ar') }}</div>
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="description_en">English description</label>
            <input type="text" class="form-control" id="description_en" placeholder="Enter English description" name="description_en" value="{{ old('description_en') ?? $seoData[0]->description_en }}">
            <div>{{ $errors->first('link') }}</div>
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="description_ar">Arablic description</label>
            <input type="text" class="form-control" id="description_ar" placeholder="Enter arabic description" name="description_ar" value="{{ old('description_ar') ?? $seoData[0]->description_ar }}">
            <div>{{ $errors->first('link') }}</div>
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="keyword_en">English keyword</label>
            <input type="text" class="form-control" id="keyword_en" placeholder="Enter english keyword" name="keyword_en" value="{{ old('keyword_en') ?? $seoData[0]->keyword_en }}">
            <div>{{ $errors->first('link') }}</div>
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="keyword_ar">Arabic keyword</label>
            <input type="text" class="form-control" id="keyword_ar" placeholder="Enter arabic keyword" name="keyword_ar" value="{{ old('keyword_ar') ?? $seoData[0]->keyword_ar }}">
            <div>{{ $errors->first('link') }}</div>
        </div>
    </div>


    <div class="col-12">
        <div class="form-group">
            <label for="script_head">Header script</label>
            <input type="text" class="form-control" id="script_head" placeholder="Enter header script" name="script_head" value="{{ old('script_head') ?? $seoData[0]->script_head }}">
            <div>{{ $errors->first('link') }}</div>
        </div>
    </div>


    <div class="col-12">
        <div class="form-group">
            <label for="script_footer">Footer script</label>
            <input type="text" class="form-control" id="script_footer" placeholder="Enter footer script" name="script_footer" value="{{ old('script_footer') ?? $seoData[0]->script_footer }}">
            <div>{{ $errors->first('link') }}</div>
        </div>
    </div>
</div>
@csrf
