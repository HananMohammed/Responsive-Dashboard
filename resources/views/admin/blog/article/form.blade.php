@php
    $categoreyName = 'category_name_'.trans('systems.lang');
@endphp
<style type="text/css">
</style>
<div class="row align-items-center">
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="title_en">name En</label>
            <input type="text" class="form-control" id="title_en" placeholder="Enter name" name="article_en" value="{{ old('article_en') ?? $blog->article_en }}">
            <div>{{ $errors->first('article_en') }}</div>
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="title_ar">name ar</label>
            <input type="text" class="form-control" id="title_ar" placeholder="Enter name" name="article_ar" value="{{ old('article_ar') ?? $blog->article_ar }}">
            <div>{{ $errors->first('article_ar') }}</div>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="content_en">body en</label>
            <textarea name="article_body_en" id="content_en" class="form-control "  placeholder="Enter content" >
                {{$blog['article_body_en']}}
            </textarea>
            <div>{{ $errors->first('article_body_en') }}</div>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="content_ar">body ar</label>

            <textarea name="article_body_ar" id="content_ar" class="form-control"  placeholder="Enter content" >
                {{$blog['article_body_ar']}}
            </textarea>
            <div>{{ $errors->first('article_body_ar') }}</div>
        </div>
    </div>




    <div class="col-md-6 col-sm-12">
        <label for="category_id">Categories</label>
        <select class="form-control" id="category_id" name="category_id">
            <option value="" disabled >Select category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" >{{ $category-> $categoreyName}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-6 col-sm-12" type="file" name="images">
        <label class="col-form-label text-lg-left">image<span class="text-danger">*</span>  </label>
        <div>
            <label for="upload-single-photo" style="cursor: pointer;" >
                <div class="dropzone dropzone-default">
                    @if(  count($blog->toArray()) == 0 )
                        <div class="dropzone-msg2 dz-message">
                            <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                            <span class="dropzone-msg-desc">This is just a demo dropzone. Selected files are
                        <strong>not</strong>actually uploaded.</span>
                        </div>
                        <img id="outputSingleImage" width="200" height="150px" style="border-radius: 2%;display: none" />
                    @else
                        <img id="outputSingleImage" width="200" src="{{asset_public('image/'.$blog->images)}}"  height="150px" style="border-radius: 2%;" />
                    @endif
                </div>
            </label>
            <input type="file"  name="images" id="upload-single-photo"  onchange="loadFile(event)" hidden >
            @if($errors->has('images'))
                <span class="error">{{ $errors->get('images')[0] }}</span>
            @endif
        </div>
    </div>
    @include('admin.blog.seo.index')
</div>
@csrf
