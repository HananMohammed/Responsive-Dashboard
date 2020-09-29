<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProjectCategoryRequest;

class ProjectsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list');
        $projectCategories = Category::all();
        return view('admin.projects.category.index',compact('projectCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create');
        $projectCategories = new Category;
        return view('admin.projects.category.create' , compact('projectCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProjectCategoryRequest $request
     * @param Category $category
     * @return back
     */
    public function store(ProjectCategoryRequest $request, Category $category)
    {
        $this->authorize('create');
        $category->name_en = $request->get('name_en');
        $category->name_ar = $request->get('name_ar');
        $category->created_by = auth()->user()->id;
        $category->save();
        return redirect() -> route('admin.projects-category.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return back
     */
    public function edit($id)
    {
        $this->authorize('edit');
        $projectCategories = Category::find($id);

        return view('admin.projects.category.edit' ,compact('projectCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update');
        $category = Category::find($id);
        $category->  name_en = $request-> get('name_en');
        $category->  name_ar = $request-> get('name_ar');
        $category->  created_by = auth()->user()->id;
        $category -> save();
       return redirect() -> route('admin.projects-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  Category  $projectCategories
     * @return back
     */
    public function destroy(Category $projectCategories ,$id)
    {
        $this->authorize('delete');
        $projectCategories->where('id' , $id)->delete();
        return redirect()->back();
    }
}
