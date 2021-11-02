<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'tel' => '',
            'email' => 'required|email',
            'permissions' => 'json',
            'password' => 'required|string|min:8',
            'role_id' => 'required|integer|exists:roles,id'
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
            'firstname.required' => 'A firstname is required',
            'lastname.required' => 'A lastname is required',
            'tel' => 'string',
            'email.required' => 'A is requirednique:users',
            'permissions' => 'json',
            'password.required' => 'A password is required',
            'role_id.required' => 'A role is required'
        ];
    }
}
