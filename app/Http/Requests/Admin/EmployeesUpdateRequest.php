<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeesUpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string',
                       Rule::unique('users')->ignore(request('user')),
            'password' => 'required|string',
            'role' => 'required',
            'profile_photo_path'=>'mimes:jpeg,jpg,png,gif,svg|max:10000'

        ];
    }
}

