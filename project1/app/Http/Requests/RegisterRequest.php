<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
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
            'username' => 'required|min:6|max:50|unique:users',
            'email' => 'required|email',
            'password' => 'required|min:6|max:100',
            'confirm_password' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => __('requestVali.required-username'),
            'username.mim' => __('requestVali.min-username'),
            'username.max' => __('requestVali.max-username'),
            'username.unique' => __('requestVali.unique-username'),
            'email.required' => __('requestVali.required-email'),
            'email.email' => __('requestVali.email-email'),
            'password.required' => __('requestVali.required-password'),
            'password.min' => __('requestVali.min-password'),
            'password.max' => __('requestVali.max-password'),
            'confirm_password.required' => __('requestVali.required-confirm-password'),
            'confirm_password.same' => __('requestVali.same-confirm-password'),
        ];  
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(
            [
                'error' => $errors,
                'status_code' => 422,
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY
        ));
    }
}
