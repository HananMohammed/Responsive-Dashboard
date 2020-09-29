<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogStoreRequest extends FormRequest
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
            'category_id'=>'required' ,
            'article_en'=>'required|string|unique:blog_articles,article_en',
            'article_ar'=>'required|string|unique:blog_articles,article_ar',
            'images'=>'required',
            'images.*'=>'mimes:jpeg,jpg,png,gif,svg|max:10000',

        ];
    }
}
