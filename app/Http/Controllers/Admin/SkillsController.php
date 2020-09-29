<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SkillsRequest;
use App\SingleAbout;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list');
        $skills = SingleAbout::all();

        return view('assets.skills.index',compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create');
        return view('assets.skills.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SingleAbout $skills, SkillsRequest $request)
    {
        $this->authorize('create');
        $skills->  name_en = json_encode($request->get('name_en'));
        $skills->  name_ar = json_encode($request->get('name_ar'));
        $skills->  text_en = $request-> get('text_en');
        $skills->  text_ar = $request-> get('text_ar');
        $skills->  number = json_encode($request->get('number'));
        $skills->  seo_keyword_en = $request-> get('seo_keyword_en');
        $skills->  seo_keyword_ar = $request-> get('seo_keyword_ar');
        $skills->  seo_title_en = $request-> get('seo_title_en');
        $skills->  seo_title_ar = $request-> get('seo_title_ar');
        $skills->  seo_description_en = $request-> get('seo_description_en');
        $skills->  seo_description_ar = $request-> get('seo_description_ar');
        $skills->created_by = auth()->user()->id;
        $skills-> save();
        return redirect() -> route('assets.skills.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('edit');
        $skills = SingleAbout::find($id);
        return view('assets.skills.update' ,compact('skills'));
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
        $skills = SingleAbout::find($id);
        $skills->  name_en = json_encode($request->get('name_en'));
        $skills->  name_ar = json_encode($request->get('name_ar'));
        $skills->  text_en = $request-> get('text_en');
        $skills->  text_ar = $request-> get('text_ar');
        $skills->  number = json_encode($request->get('number'));
        $skills->  seo_keyword_en = $request-> get('seo_keyword_en');
        $skills->  seo_keyword_ar = $request-> get('seo_keyword_ar');
        $skills->  seo_title_en = $request-> get('seo_title_en');
        $skills->  seo_title_ar = $request-> get('seo_title_ar');
        $skills->  seo_description_en = $request-> get('seo_description_en');
        $skills->  seo_description_ar = $request-> get('seo_description_ar');
        $skills->created_by = auth()->user()->id;
        $skills-> save();
        return redirect() -> route('assets.skills.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SingleAbout $skills, $id)
    {
        $this->authorize('delete');
        $skills->where('id' , $id)->delete();
        return redirect()->back();
    }
}
