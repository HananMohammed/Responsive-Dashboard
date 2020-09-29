<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Offers;
use App\Http\Requests\Admin\OfferStoreRequest;
use App\Http\Requests\Admin\OfferUpdateRequest;

class OfferController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index( )
    {
        $this->authorize('list');
        $offers = Offers::all();
        return view('admin.offers.index' , compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create');
        $offer = [] ;
        return view('admin.offers.create')->with('offer' ,$offer );
    }


    public function store(OfferStoreRequest $request )
    {
        $this->authorize('create');
        $model = new Offers();
         $model->name_en = $request->input('name_en');
         $model->name_ar = $request->input('name_ar') ;
         $model->text_en = $request->input('text_en') ;
         $model->text_ar = $request->input('text_ar');
         $model->slug_en = $request->input('slug_en').
         $model->offer_status  = $request->input('offer_status') ;
         $model->created_by = auth()->user()->id ;
         $model->seo_title_ar =  $request->get('seo_title_ar') ;
         $model->seo_title_en =  $request->get('seo_title_en') ;
         $model->seo_description_en =  $request->get('seo_description_en') ;
         $model->seo_description_ar =  $request->get('seo_description_ar') ;
         $model->seo_keyword_en =  $request->get('seo_keyword_en') ;
         $model->seo_keyword_ar =  $request->get('seo_keyword_ar') ;
         if($request->file('images'))
         {
            $model->images = upload_image($request->file('images'));
         }
         if($request->file('single_image'))
         {
            $model->single_image = upload_image($request->file('single_image'));
         }
         $model->save();
         return redirect()->route('admin.offers.index');
    }

    /**
     * @param Offers $offer
     * @return \Illuminate\View\View
     */
    public function edit(Offers $offer)
    {
        $this->authorize('edit');
        return view('admin.offers.edit' , compact('offer'));
    }

    /**
     * @param Offers $offer
     * @param OfferUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Offers $offer , OfferUpdateRequest $request )
    {
        $this->authorize('update');
        $offer->name_en = $request->get('name_en');
        $offer->name_ar = $request->get('name_ar') ;
        $offer->text_en = $request->get('text_en') ;
        $offer->text_ar = $request->get('text_ar') ;
        $offer->slug_en = $request->get('slug_en') ;
        $offer->offer_status =$request->get('offer_status') ;
        $offer -> created_by = auth()->user()->id ;
        $offer->seo_title_ar =  $request->get('seo_title_ar') ;
        $offer->seo_title_en =  $request->get('seo_title_en') ;
        $offer->seo_description_en =  $request->get('seo_description_en') ;
        $offer->seo_description_ar =  $request->get('seo_description_ar') ;
        $offer->seo_keyword_en =  $request->get('seo_keyword_en') ;
        $offer->seo_keyword_ar =  $request->get('seo_keyword_ar') ;
        if($request->file('images'))
        {
            $offer->images = upload_image($request->file('images'));
        }
        if($request->file('single_image'))
        {
            $offer->single_image = upload_image($request->file('single_image'));
        }
        $offer->save();
        return redirect()->route('admin.offers.index');

    }

    /**
     * @param Offers $offer
     * @return back
     */
    public function destroy(Offers $offer)
    {
        $this->authorize('delete');
        $offer->delete();
        return back();
    }

}
