<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BlogArticle;
use App\Models\Admin\BlogCategory;
use App\Http\Requests\Admin\BlogStoreRequest;
use App\Http\Requests\Admin\BlogUpdateRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list');
       $articles = BlogArticle::all();
       return view('admin.blog.article.index', compact('articles'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create');
        $categories = BlogCategory::all();
        $blog = new BlogArticle();
        return view('admin.blog.article.create', compact('categories' ,'blog'));
    }

    /**
     * @param BlogStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BlogStoreRequest $request)
    {
        $this->authorize('create');
        $article = new BlogArticle();
        $article->article_en = $request->get("article_en");
        $article->article_ar = $request->get("article_ar");
        $article->article_body_en = $request->get("article_body_en");
        $article->article_body_ar = $request->get("article_body_ar");
        $article->category_id = $request->get("category_id");
        $article->seo_title_en = $request->get("seo_title_en");
        $article->seo_title_ar = $request->get("seo_title_ar");
        $article->seo_description_en = $request->get("seo_description_en");
        $article->seo_description_ar = $request->get("seo_description_ar");
        $article->seo_keyword_en = $request->get("seo_keyword_en");
        $article->seo_keyword_ar = $request->get("seo_keyword_ar");
        $article->created_by = auth()->user()->id;

        if ($request->has("images")) {
            $article->images = upload_image($request->file('images'));
        }

        $article->save();

        return redirect()->route('admin.blog.index');
    }

    /**
     * @param BlogArticle $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(BlogArticle $blog)
    {
        $this->authorize('edit');
        $categories = BlogCategory::all();
        return view('admin.blog.article.edit' ,compact('blog', 'categories'));
    }

    /**
     * @param $blog
     * @param BlogUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BlogUpdateRequest $request, BlogArticle $blog)
    {
        $this->authorize('update');
        $blog->article_en = $request->get("article_en");
        $blog->article_ar = $request->get("article_ar");
        $blog->article_body_en = $request->get("article_body_en");
        $blog->article_body_ar = $request->get("article_body_ar");
        $blog->category_id = $request->get("category_id");
        $blog->seo_title_en = $request->get("seo_title_en");
        $blog->seo_title_ar = $request->get("seo_title_ar");
        $blog->seo_description_en = $request->get("seo_description_en");
        $blog->seo_description_ar = $request->get("seo_description_ar");
        $blog->seo_keyword_en = $request->get("seo_keyword_en");
        $blog->seo_keyword_ar = $request->get("seo_keyword_ar");
        $blog->created_by = auth()->user()->id;
        if($request->file('images'))
        {
            $blog->images = upload_image($request->file('images'));
        }

        $blog->save();

        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  BlogArticle  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogArticle $blog)
    {
        $this->authorize('delete');
        $blog->delete();

        return redirect()->route('admin.blog.index');

    }

}
