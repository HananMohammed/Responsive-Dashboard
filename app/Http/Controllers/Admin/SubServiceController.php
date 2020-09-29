<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SubServiceRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\SubService;
class SubServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list');
        $subServices = SubService::all();

        return view('admin.services.cards.index' ,compact('subServices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create');
        $subService=[];
        return view('admin.services.cards.create')->with('subService' ,$subService);
    }


    /**
     * @param SubServiceRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \WebPConvert\Convert\Exceptions\ConversionFailedException
     */
    public function store(SubServiceRequest $request)
    {
        $this->authorize('create');
        $subService = new SubService();
        $subService->name_en = $request->name_en ;
        $subService->name_ar = $request->name_ar ;
        $subService->text_en = $request->text_en ;
        $subService->text_ar = $request->text_ar ;
        $subService->created_by = auth()->user()->id;
        if($request->file('images')) {
            $subService->images = upload_image($request->file('images'));
        }
        $subService->save();
        return redirect() -> route('admin.sub_service.index') ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SubService $subService)
    {
        $this->authorize('edit');
        return view('admin.services.cards.edit' , compact('subService'));
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \WebPConvert\Convert\Exceptions\ConversionFailedException
     */
    public function update(Request $request, SubService $subService)
    {
        $this->authorize('update');
        $subService->name_en = $request->name_en ;
        $subService->name_ar = $request->name_ar ;
        $subService->text_en = $request->text_en ;
        $subService->text_ar = $request->text_ar ;
        $subService->created_by = auth()->user()->id;
        if($request->file('images'))
        {
            $subService->images  = upload_image($request->file('images'));
        }
        $subService->save();
        return redirect() -> route('admin.sub_service.index') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubService $subService)
    {
        $this->authorize('delete');
        $subService->delete();
        return back();
    }
}
