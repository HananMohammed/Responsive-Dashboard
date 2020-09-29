<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OfferStoreRequest extends FormRequest
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
            'offer_status' =>'required|numeric',
            'name_en'=>'required|unique:offers,name_en|string',
            'name_ar'=>'required|unique:offers,name_ar|string',
            'text_en'=>'required|string',
            'text_ar'=>'required|string',
            'slug_en'=>'required|unique:offers,slug_en|alpha_dash',
            'images'=>'required|mimes:jpeg,jpg,png,gif,svg|max:10000',
            'single_image'=> 'required|mimes:jpeg,jpg,png,gif,svg|max:10000',
            "seo_title_en" => "nullable",
            "seo_title_ar" => "nullable",
            "seo_description_en" => "nullable",
            "seo_description_ar" => "nullable",
            "seo_keyword_en" => "nullable",
            "seo_keyword_ar" => "nullable",

        ];

    }
}
