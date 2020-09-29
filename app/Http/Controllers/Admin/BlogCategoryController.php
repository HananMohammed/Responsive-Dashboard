<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\BlogCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogCategoryStoreRequest;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list');
       $categories = BlogCategory::all();

       return view('admin.blog.category.index', compact('categories'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create');
        $blog_category = new BlogCategory();
        return view('admin.blog.category.create' , compact('blog_category'));
    }

    /**
     * @param BlogCategoryStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BlogCategoryStoreRequest $request)
    {
        $this->authorize('create');
        BlogCategory::create([
            "category_name_en" => $request->get("category_name_en"),
            "category_name_ar" => $request->get("category_name_ar"),
            "created_by" => auth()->user()->id
        ]);

        return redirect()->route('admin.blog-category.index');
    }

    /**
     * @param BlogCategory $blog_category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(BlogCategory $blog_category)
    {
        $this->authorize('edit');
        return view('admin.blog.category.edit' ,compact('blog_category'));
    }

    /**
     * @param BlogCategory $blog_category
     * @param BlogCategoryStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BlogCategoryStoreRequest $request, BlogCategory $blog_category)
    {
        $this->authorize('update');
        $blog_category->update([
            "category_name_en" => $request->get("category_name_en"),
            "category_name_ar" => $request->get("category_name_ar")
        ]);

        return redirect()->route('admin.blog-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  BlogCategory $blog_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogCategory $blog_category)
    {
        $this->authorize('delete');
        $blog_category->delete();

        return redirect()->route('admin.blog-category.index');

    }

}
