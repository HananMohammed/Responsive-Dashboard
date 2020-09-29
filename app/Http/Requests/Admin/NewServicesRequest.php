<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewServicesRequest extends FormRequest
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
            'name_en'=>'required|string|unique:new_services,name_en',
            'name_ar'=>'required|string',
            'text_en'=>'required|string',
            'text_ar'=>'required|string',
            'slug_en'=>'required|string|unique:new_services,slug_en',
            'sluginput_en'=>'required|string',
            'sluginput_ar'=>'required|string',
            'images'=>'required|mimes:jpeg,jpg,png,gif,svg|required|max:10000',
            'logo'=>'required|mimes:jpeg,jpg,png,gif,svg|required|max:10000',
            'single_images'=>'required|mimes:jpeg,jpg,png,gif,svg|required|max:10000' ,

        ];
    }
}
