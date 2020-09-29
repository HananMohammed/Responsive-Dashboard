<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SeoRequest extends FormRequest
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
            'title_en' =>'required|string',
            'title_ar' =>'required|string',
            'description_en' =>'required|string',
            'description_ar' =>'required|string',
            'keyword_en' =>'required|string',
            'keyword_ar' =>'required|string',
            'script_head' =>'required|string',
            'script_footer' =>'required|string',
        ];
    }
}
