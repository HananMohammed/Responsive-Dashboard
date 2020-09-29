<?php

namespace App\Http\Controllers\Admin;

use App\Features;
use App\Http\Requests\Admin\FeaturesRequest;
use App\repository\CrudRepository;
use App\Http\Controllers\Controller;

class FeatureController extends Controller
{
     protected $model;

    /**
     * FeatureController constructor.
      * @param Features $model
     */
    public function __construct( Features $model)
    {
       $this->model = $model;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $this->authorize('list');
        $feature= $this->model->first();

       return view('assets.feature.edit',compact('feature'));
    }


    /**
     * @param FeaturesRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \WebPConvert\Convert\Exceptions\ConversionFailedException
     */
    public function update(FeaturesRequest $request )
    {
        $this->authorize('update');
        $model = $this->model->first();
        $model->features_ar = $request->features_ar;
        $model->features_en = $request->features_en;
        $model->created_by = auth()->user()->id;

        if (is_array($request->file('images')))
        {
             $model->images = upload_images($request->file('images'));
        }
        $model->save();
        return redirect()->back();

    }
}
