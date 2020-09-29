<?php

namespace App\Http\Controllers\Admin;

use App\BlogArticle;
use App\BlogImagesController;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogImagesReq;
use App\repository\UploadImage;

class BlogImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list');
        $images = BlogImagesController::all();

       return view('assets.blog.images.index', compact('images'));
    }

    /**
     * @param BlogImagesReq $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BlogImagesReq $request)
    {
        $this->authorize('create');
        $blogImage = new BlogImagesController();
        $image = new UploadImage('image', 'image', request()->file("images"));
        $blogImage->images = $image->UploadeImage();
        $blogImage->save();

        return redirect()->route('assets.blog-image.index');
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  BlogImagesController $blog_image
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogImagesController $blog_image)
    {
        $this->authorize('delete');
        $blog_image->delete();

        return redirect()->route('assets.blog-image.index');

    }

}
