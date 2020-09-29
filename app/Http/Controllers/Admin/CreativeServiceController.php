<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreativeServiceRequest;
use App\Models\Admin\NewCreativeServices;

class CreativeServiceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list');
        $creativeServices = NewCreativeServices::all();

       return view('admin.services.creative-service.index' ,compact('creativeServices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create');
        $creativeService=[];
        return view('admin.services.creative-service.create')->with('creativeService',$creativeService);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreativeServiceRequest $request)
    {
        $this->authorize('create');
        $creativeService = new NewCreativeServices() ;
        $creativeService->create([
          'name_en' =>  $request->name_en ,
          'name_ar' =>  $request->name_ar ,
          'text_en' =>  $request->text_en ,
          'text_ar' =>   $request->text_ar ,
          'created_by' => auth()->user()->id ,
        ]);

        return redirect()->route('admin.creative_service.index' );

    }


    /**
     * @param NewCreativeServices $creativeService
     * @return \Illuminate\View\View
     */
    public function edit(NewCreativeServices $creativeService)
    {
        $this->authorize('edit');
        return view('admin.services.creative-service.edit' ,compact('creativeService'));
    }

    /**
     * @param Request $request
     * @param NewCreativeServices $creativeService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, NewCreativeServices $creativeService)
    {
        $this->authorize('update');
        $creativeService->update([
            'name_en' =>  $request->name_en ,
            'name_ar' =>  $request->name_ar ,
            'text_en' =>  $request->text_en ,
            'text_ar' =>   $request->text_ar ,
            'created_by' => auth()->user()->id ,
        ]);

        return redirect()->route('admin.creative_service.index' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  NewCreativeServices $creativeService
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewCreativeServices $creativeService)
    {
        $this->authorize('delete');
        $creativeService->delete();
        return back() ;
    }

}
