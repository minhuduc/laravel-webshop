<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max255'
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute is required',
            'min' => ':attibute from 2 to 255',
            'max' => ':attibute from 2 to 255'
        ];
    }
    public function attributes(){
        return [
            'name' => 'Category name'

        ];
    }
}
