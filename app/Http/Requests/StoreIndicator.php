<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIndicator extends FormRequest
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
            'name' => 'required|string',
            'description' => 'string',
            'type' => 'string',
            'direction' => 'string',
            'baseline' => 'integer',
            'target' => 'integer',
            'unit' => 'integer',
            'activity_id' => 'integer|required|exists:activities,id|unique:indicators',
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
            'name.required' => 'An indicatore name is required',
            'activity_id.required' => 'An activity is required',
        ];
    }
}
