<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SkillsRequest extends FormRequest
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
            'text_en'=>'required|string',
            'text_ar'=>'required|string',
            'name_en'=>'required',
            'name_en .*'=>'string',
            'name_ar'=>'required',
            'name_ar .*'=>'string',
            'number'=>'required',
            'number .*'=>'numeric|min:1|max:3',
//            'name_ar[]'=>'required|string',

        ];
    }
}
