<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category' => 'required|max:50'
        ];
    }

    public function messages()
    {
        return [
            'category.required' => __('requestVali.required-cate'),
            'category.max' =>  __('requestVali.max-cate'),
        ];
    }
}
