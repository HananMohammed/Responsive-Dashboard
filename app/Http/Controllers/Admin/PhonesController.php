<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PhoneRequest;
use App\Phones;

class PhonesController extends Controller
{
    private $phone ;

    /**
     * PhonesController constructor.
     * @param Phones $phone
     */
    public function __construct(Phones $phone)
    {
        $this->phone = $phone ;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list');
        $phone = $this->phone->all();

        return view('assets.phone.index',compact('phone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PhoneRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneRequest $request)
    {
        $this->authorize('create');
        $this->phone->create([
            'phone' => $request->phone
        ]) ;

        return redirect()->back();

    }
    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $this->authorize('delete');
         $this->phone->where('id' , $id)->delete();

         return redirect()->back();
    }
}
