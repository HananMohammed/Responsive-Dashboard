<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProjectRequest;
use App\Models\Admin\Project;
use App\Models\Admin\Category;
use Illuminate\Support\Str;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $categories = Category::all();
        return view('admin.projects.index' , compact('projects' , 'categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create');
        $projects = new Project();
        $categories = Category::all();

        return view('admin.projects.create' , compact('categories', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProjectRequest $request
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request, Project $project)
    {
        $this->authorize('create');
        $project->proj_name_en = $request-> get('proj_name_en');
        $project->proj_name_ar = $request-> get('proj_name_ar');
        $project->link = $request-> get('link');
        $project->created_by = auth()->user()->id;
        if ($request->file('images'))
        {
            $project->images = upload_images($request->file('images'));
        }
        $project->category_id = $request-> get('category_id');
        $project->seo_description_en =  $request->get('seo_description_en') ;
        $project->seo_description_ar =  $request->get('seo_description_ar') ;
        $project->seo_keyword_en =  $request->get('seo_keyword_en') ;
        $project->seo_keyword_ar =  $request->get('seo_keyword_ar') ;
        $project-> save();

        return redirect() -> route('admin.projects.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('edit');
        $categories = Category::all();
        $projects = Project::find($id);
        return view('admin.projects.edit' ,compact('projects', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->authorize('update');
        $project->  proj_name_en = $request-> get('proj_name_en');
        $project->  proj_name_ar = $request-> get('proj_name_ar');
        $project->  link = $request-> get('link');
        if (is_array($request->file('images')))
        {
            $project->images = updateMultiImage($request->file('images') , $project->images);
        }
        $project->created_by = auth()->user()->id;
        $project->  category_id = $request-> get('category_id');
        $project-> save();
        return redirect() -> route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $this->authorize('delete');
        $project->delete();
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteImage(Request $request)
    {
        $this->authorize('delete');

        if($request->json()){

             $project =Project::find($request->id);
             $jsonImages = $project->get('images');
             $jsonToArrayImages = json_decode( $jsonImages[0]["images"], true);
             foreach ($jsonToArrayImages as $key =>$image)
             {
                 if(Str::contains($image,$request->image))
                 {
                     unset($jsonToArrayImages[$key]);
                 }
             }
             $images = collect($jsonToArrayImages)->values()->all();

             (empty($images)) ? $project->update(["images" =>null]) :
                                $project->update(["images" => json_encode($jsonToArrayImages)]);

            return response()->json(['success' => "delete image" , "data " => $request->image]);

        }

    }
}
