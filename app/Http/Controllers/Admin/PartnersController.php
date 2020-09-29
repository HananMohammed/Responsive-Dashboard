<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PartnersStoreRequest;
use App\Http\Requests\Admin\PartnersUpdateRequest;
use App\Partner;
use App\Http\Controllers\Controller;

class PartnersController extends Controller
{
    protected $model ;
    /**
     * PartnersController constructor.
     * @param Partner $model
     */
    public function __construct( Partner $model)
    {
        $this->model = $model ;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list');
        $partners =  $this->model->all();
       return view('assets.partners.index' , compact('partners'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create');
        return view('assets.partners.edit') ;
    }

    /**
     * @param PartnersStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PartnersStoreRequest $request )
    {
        $this->authorize('create');
        $this->model->title = $request->get('title');
        $this->model->created_by = auth()->user()->id;

        if ( $request->hasFile('image_path') )
        {
            $this->model->image_path = upload_image( $request -> file('image_path') );

        }

        $this->model->save();
         return redirect()->route('assets.partners.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $this->authorize('edit');
        $partner = $this->model->findOrFail($id);

        return view('assets.partners.update' ,compact('partner'));

    }

    /**
     * @param $id
     * @param PartnersUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id , PartnersUpdateRequest$request)
    {
        $this->authorize('update');
        $model =  $this->model->find($id) ;
        $model->title = $request->get('title');
        $model->created_by = auth()->user()->id;

        if ( $request->hasFile('image_path') )
        {
            $model->image_path = upload_image( $request -> file('image_path') );

        }

        $model->save();
        return redirect()->route('assets.partners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete');
        $this->model->where('id' , $id)->delete();

        return redirect()->route('assets.partners.index');

    }
}
