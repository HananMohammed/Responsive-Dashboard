<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\NewServices;
use App\Http\Requests\Admin\NewServicesUpdateRequest;
use App\Http\Requests\Admin\NewServicesRequest;
class NewServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list');
        $services = NewServices::all();

        return view('admin.services.index' ,compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create');

        return view('admin.services.create')->with('newService',[]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( NewServicesRequest $request )
    {
        $this->authorize('create');
        $service = new NewServices();
        $service->name_en = $request->input('name_en') ;
        $service->name_ar = $request->input('name_ar') ;
        $service->text_en = $request->input('text_en') ;
        $service->text_ar = $request->input('text_ar') ;
        $service->slug_en = $request->input('slug_en') ;
        $service->sluginput_en = $request->input('sluginput_en') ;
        $service->sluginput_ar = $request->input('sluginput_ar') ;
        $service->seo_title_ar =  $request->input('seo_title_ar') ;
        $service->seo_title_en =  $request->input('seo_title_en') ;
        $service->seo_description_en =  $request->input('seo_description_en') ;
        $service->seo_description_ar =  $request->input('seo_description_ar') ;
        $service->seo_keyword_en =  $request->input('seo_keyword_en') ;
        $service->seo_keyword_ar =  $request->input('seo_keyword_ar') ;
        $service->created_by  = auth()->user()->id ;
        $service->images = upload_image($request->file('images')) ;
        $service->logo = upload_image($request->file('logo')) ;
        $service->single_images = upload_image($request->file('single_images')) ;
        $service->save() ;

        return redirect()->route('admin.new-services.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(NewServices $newService)
    {
        $this->authorize('edit');
        return view('admin.services.edit' ,compact('newService'));

    }


    public function update(NewServices $newService ,NewServicesUpdateRequest $request)
    {
        $this->authorize('update');
        $newService->name_en = $request->input('name_en') ;
        $newService->name_ar = $request->input('name_ar') ;
        $newService->text_en = $request->input('text_en') ;
        $newService->text_ar = $request->input('text_ar') ;
        $newService->slug_en = $request->input('slug_en') ;
        $newService->sluginput_en = $request->input('sluginput_en') ;
        $newService->sluginput_ar = $request->input('sluginput_ar') ;
        $newService->seo_title_ar =  $request->input('seo_title_ar') ;
        $newService->seo_title_en =  $request->input('seo_title_en') ;
        $newService->seo_description_en =  $request->input('seo_description_en') ;
        $newService->seo_description_ar =  $request->input('seo_description_ar') ;
        $newService->seo_keyword_en =  $request->input('seo_keyword_en') ;
        $newService->seo_keyword_ar =  $request->input('seo_keyword_ar') ;
        $newService->created_by  = auth()->user()->id ;
        if($request->file('images'))
        {
            $newService->images = upload_image($request->file('images')) ;
        }
        if($request->file('logo'))
        {
            $newService->logo = upload_image($request->file('logo')) ;
        }
        if ($request->file('single_images'))
        {
            $newService->single_images = upload_image($request->file('single_images')) ;
        }

        $newService->save() ;
          return redirect()->route('admin.new-services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( NewServices $newService)
    {
        $this->authorize('delete');
        $newService->delete();

        return redirect()->back();
     }
}
