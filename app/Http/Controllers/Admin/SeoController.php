<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SeoRequest;
use App\Models\Admin\Seo;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list');
        $seoData = Seo::all();

        return view('admin.seo.edit' , compact('seoData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeoRequest $request , Seo $seoData)
    {
        $this->authorize('create');
        $seoData->create([
            "title_en" => $request-> get('title_ar'),
            "title_ar" => $request-> get('title_ar'),
            "description_en" =>$request-> get('description_en'),
            "description_ar" => $request-> get('description_ar'),
            "keyword_en" => $request-> get('keyword_en'),
            "keyword_ar" => $request-> get('keyword_ar') ,
            "script_head" => $request-> get('script_head') ,
            "script_footer" =>$request-> get('script_footer'),
            "created_by" => auth()->user()->id
        ]);

        return redirect() -> route('admin.seo.update');
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
        $seoData = Seo::find($id);
        $seoData->update([
        "title_en" => $request-> get('title_en'),
        "title_ar" => $request-> get('title_ar'),
        "description_en" => $request-> get('description_en'),
        "description_ar" => $request-> get('description_ar'),
        "keyword_en" => $request-> get('keyword_en'),
        "keyword_ar" => $request-> get('keyword_ar'),
        "script_head" => $request-> get('script_head'),
        "script_footer" => $request-> get('script_footer'),
        "created_by" => auth()->user()->id,

        ]);

        return redirect() -> route('admin.seo.index');
    }
}
