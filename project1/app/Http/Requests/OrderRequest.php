<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OrderRequest extends FormRequest
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
            'name' => 'required|max:100',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'address' => 'required|max:500'
        ];
    }
    public function messages()
    {
        return [
            'name.max' => __('requestVali.max-name'),
            'email.required' => __('requestVali.required-email'),
            'email.email' => __('requestVali.email-email'),
            'phone.digits' => __('requestVali.number-phone'),
            'address.required' => ('requestVali.required-address'),
            'address.max' => ('requestVali.max-address'),
        ];
    }
}
