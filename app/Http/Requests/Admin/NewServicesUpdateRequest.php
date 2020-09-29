<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewServicesUpdateRequest extends FormRequest
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
            'name_en'=>['required','string',Rule::unique('new_services','name_en')->ignore($this->new_service->id)],
            'name_ar'=>'required|string',
            'text_en'=>'required|string',
            'text_ar'=>'required|string',
            'slug_en'=>['required','alpha_dash',Rule::unique('new_services','slug_en')->ignore($this->new_service->id)],
            'sluginput_en'=>'required|string',
            'sluginput_ar'=>'required|string',
            'images'=>'mimes:jpeg,jpg,png,gif,svg|max:10000',
            'logo'=>'mimes:jpeg,jpg,png,gif,svg|max:10000',
            'single_images'=>'mimes:jpeg,jpg,png,gif,svg|max:10000' ,

        ];
    }
}
