<?php

namespace App\Http\Requests\Admin;

use App\Offers;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OfferUpdateRequest extends FormRequest
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
    public function rules( )
    {
        return [
            'offer_status' =>'required|numeric',
            'name_en'=>["required",'string',Rule::unique('offers','name_en')->ignore($this->offer->id)],
            'name_ar'=>["required",'string',Rule::unique('offers','name_ar')->ignore($this->offer->id)],
            'text_en'=>'required|string',
            'text_ar'=>'required|string',
            'slug_en'=>["required",'alpha_dash',Rule::unique('offers','slug_en')->ignore($this->offer->id)],
            'images'=>'mimes:jpeg,jpg,png,gif,svg|max:10000',
            'single_image'=> 'mimes:jpeg,jpg,png,gif,svg|max:10000',
            "seo_title_en" => "nullable",
            "seo_title_ar" => "nullable",
            "seo_description_en" => "nullable",
            "seo_description_ar" => "nullable",
            "seo_keyword_en" => "nullable",
            "seo_keyword_ar" => "nullable",
        ];

    }
}
