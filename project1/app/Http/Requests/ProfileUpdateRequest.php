<?php

namespace App\Http\Requests;

use App\Enums\UserGender;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'first_name' => 'max:20',
            'last_name' => 'max:40',
            'email' => 'required|email',
            'phone' => 'digits:10',
            'birthday' => 'date',
            'gender' => 'enum_value:'.UserGender::class.',false',
        ];
    }

    public function messages()
    {
        return [
            'first_name.max' => __('requestVali.max-first-name'),
            'last_name.max' => __('requestVali.max-last-name'),
            'email.required' => __('requestVali.required-email'),
            'email.email' => __('requestVali.email-email'),
            'phone.digits' => __('requestVali.number-phone'),
            'birthdat.date' => ('requestVali.date-birthday'),
            'gender.enum_value' => ('requestVali.enum-value-gender'),
        ];
    }
}
