<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPassword extends FormRequest
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
          'email' => 'required|email',
          'token' => 'required|string',
          'password' => 'required|min:6|confirmed'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'An email is required',
            'token' => 'A token is required',
            'password' => 'A password is required'
        ];
    }
}
