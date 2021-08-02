<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class ChangePassword extends FormRequest
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
            'old_password' => 'required|',
            'password' => 'required|min:6|max:100',
            'confirm_password' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => __('requestVali.required-password-old'),
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
