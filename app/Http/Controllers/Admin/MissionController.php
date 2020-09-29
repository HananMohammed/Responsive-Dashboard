<?php

namespace App\Http\Controllers\Admin;

use App\Mission;
use App\repository\CrudRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MissionRequest;


class MissionController extends Controller
{
    protected $model ;

    /**
     * MissionController constructor.
     * @param Mission $model
     */
    public function __construct(Mission $model)
    {
        $this->model = $model;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $this->authorize('edit');
        $mission = $this->model->first();

        return view('assets.mission.edit',compact('mission')) ;
    }

    /**
     * @param MissionRequest $request
     */
    public function update(MissionRequest $request)
    {
        $this->authorize('update');
        $model = $this->model->first();
        $model->mission_ar = $request->get('mission_ar');
        $model->mission_en = $request->get('mission_en');
        $model->vission_en = $request->get('vission_en');
        $model->vission_ar = $request->get('vission_ar');
        $model->gooles_en = $request->get('gooles_en');
        $model->gooles_ar = $request->get('gooles_ar');
        $model->target_en = $request->get('target_en');
        $model->target_ar = $request->get('target_ar');
        $model->save();

        return redirect()->back();
    }
}
