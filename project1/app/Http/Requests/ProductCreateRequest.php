<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'images' => 'required|image:png|dimensions:min_width=150,min_height=200',
            'name' => 'required|max:255',
            'describe' => 'required',
            'price' => 'required|numeric|min:100000',
            'discount' => 'numeric|between:0,100',
            'quantity' =>'required|numeric|min:1'
        ];
    }

    public function messages()
    {
        return [
            'images.required' => __('requestVali.required-pro-img'),
            'images.image' => __('requestVali.images-pro'),
            'images.dimensions' => __('requestVali.images-dimensions'),
            'describe.required' => __('requestVali.required-des'),
            'name.required' => __('requestVali.required-pro-name'),
            'name.max' => __('requestVali.max'),
            'price.required' => __('requestVali.required-pro-price'),
            'price.numeric' => __('requestVali.numeric-pro-price'),
            'price.min' => __('requestVali.min-pro-price'),
            'discount.numeric' => __('requestVali.numeric-pro-dis'),
            'discount.between' => __('requestVali.between-pro-dis'),
            'quantity.required' => __('requestVali.required-quantity-price'),
            'quantity.numeric' => __('requestVali.numeric-quantity-price'),
            'quantity.min' => __('requestVali.min-quantity-price'),
        ];
    }
}
