<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\ChallengeRequest;
use App\Http\Controllers\Controller;
use App\SingleAboutChallenge;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list');
        $challenges = SingleAboutChallenge::all();

        return view('assets.challenges.index',compact('challenges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create');
        return view('assets.challenges.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SingleAboutChallenge $challenges , ChallengeRequest $request)
    {
        $this->authorize('create');
        $challenges->  name_en = $request-> get('name_en');
        $challenges->  name_ar = $request-> get('name_ar');
        $challenges->  text_en = $request-> get('text_en');
        $challenges->  text_ar = $request-> get('text_ar');
        $challenges->  seo_keyword_en = $request-> get('seo_keyword_en');
        $challenges->  seo_keyword_ar = $request-> get('seo_keyword_ar');
        $challenges->  seo_title_en = $request-> get('seo_title_en');
        $challenges->  seo_title_ar = $request-> get('seo_title_ar');
        $challenges->  seo_description_en = $request-> get('seo_description_en');
        $challenges->  seo_description_ar = $request-> get('seo_description_ar');
        $challenges->created_by = auth()->user()->id;
        $challenges-> save();
        return redirect() -> route('assets.challenges.index');
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
        $challenges = SingleAboutChallenge::find($id);
        return view('assets.challenges.update' ,compact('challenges'));
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
        $challenges = SingleAboutChallenge::find($id);
        $challenges->  name_en = $request-> get('name_en');
        $challenges->  name_ar = $request-> get('name_ar');
        $challenges->  text_en = $request-> get('text_en');
        $challenges->  text_ar = $request-> get('text_ar');
        $challenges->  seo_keyword_en = $request-> get('seo_keyword_en');
        $challenges->  seo_keyword_ar = $request-> get('seo_keyword_ar');
        $challenges->  seo_title_en = $request-> get('seo_title_en');
        $challenges->  seo_title_ar = $request-> get('seo_title_ar');
        $challenges->  seo_description_en = $request-> get('seo_description_en');
        $challenges->  seo_description_ar = $request-> get('seo_description_ar');

        $challenges->created_by = auth()->user()->id;
        $challenges-> save();
        return redirect() -> route('assets.challenges.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SingleAboutChallenge $challenges, $id)
    {
        $this->authorize('delete');
        $challenges->where('id' , $id)->delete();
        return redirect()->back();
    }
}
