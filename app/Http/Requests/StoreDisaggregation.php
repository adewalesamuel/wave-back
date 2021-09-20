<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDisaggregation extends FormRequest
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
            'type' => 'required|string',
            'availability' => 'string|required',
            'fields' => 'json|required',
            'indicator_id' => 'integer|required|exists:indicators,id'
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
            'type.required' => 'A disaggregation type is required',
            'availability.required' => 'An disaggregation availability is required',
            'fields.required' => 'A disaggregation filed is required',
            'indicator_id.required' => 'An indication is required',
        ];
    }
}
