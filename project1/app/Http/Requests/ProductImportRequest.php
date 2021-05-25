<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductImportRequest extends FormRequest
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
            'file' => 'required|mimes:csv,xlsx,txt'
        ];
    }

    public function messages()
    {
        return [
            'file.required' => __('requestVali.required-import'),
            'file.mimes' => __('requestVali.mimes-import'),
        ];
    }
}
