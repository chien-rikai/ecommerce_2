<?php

namespace App\Http\Requests;

use App\Enums\ProductStatus;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'name' => 'required|max:255',
            'describe' => 'required',
            'price' => 'required|numeric|min:100000',
            'discount' => 'numeric|between:0,100',
            'status' => 'required|enum_value:'.ProductStatus::class.',false',
        ];
    }

    public function messages()
    {
        return [
            'describe.required' => __('requestVali.required-des'),
            'name.required' => __('requestVali.required-pro-name'),
            'name.max' => __('requestVali.max'),
            'price.required' => __('requestVali.required-pro-price'),
            'price.numeric' => __('requestVali.numeric-pro-price'),
            'price.min' => __('requestVali.min-pro-price'),
            'discount.numeric' => __('requestVali.numeric-pro-dis'),
            'discount.between' => __('requestVali.between-pro-dis'),
            'status.required' => __('requestVali.required-status'), 
            'status.enum_value' => __('requestVali.enum-status'), 
        ];
    }
}
