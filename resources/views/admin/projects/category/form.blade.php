<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="name">Name En</label>
            <input type="text" class="form-control" id="name_en" placeholder="Enter name" name="name_en" value="{{ old('name_en') ?? $projectCategories->name_en }}">
            <div>{{ $errors->first('name_en') }}</div>
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="name">Name Ar</label>
            <input type="text" class="form-control" id="name_ar" placeholder="Enter name" name="name_ar" value="{{ old('name_ar') ?? $projectCategories->name_ar }}">
            <div>{{ $errors->first('name_ar') }}</div>
        </div>
    </div>
</div>
@csrf
