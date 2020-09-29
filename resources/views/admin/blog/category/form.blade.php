<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="title_en">English name</label>
            <input type="text" class="form-control" id="title_en" placeholder="Enter name" name="category_name_en" value="{{ old('category_name_en') ?? $blog_category->category_name_en }}">
            <div>{{ $errors->first('category_name_en') }}</div>
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="title_ar">Arabic name</label>
            <input type="text" class="form-control" id="title_ar" placeholder="Enter name" name="category_name_ar" value="{{ old('category_name_ar') ?? $blog_category->category_name_ar }}">
            <div>{{ $errors->first('category_name_ar') }}</div>
        </div>
    </div>
</div>
@csrf
