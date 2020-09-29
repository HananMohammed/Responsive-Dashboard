<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'mission_ar'=>'required|string',
            'mission_en'=>'required|string',
            'vission_en'=>'required|string',
            'vission_ar'=>'required|string',
            'gooles_en'=>'required|string',
            'gooles_ar'=>'required|string',
            'target_en'=>'required|string',
            'target_ar'=>'required|string',
        ];
    }
}
