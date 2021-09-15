<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCollectedData extends FormRequest
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
            'values' => 'required|string',
            'notes' => 'string',
            'collection_date' => 'required|date',
            'disaggregation_values' => 'json',
            'indicator_id' => 'required|integer|exists:indicators,id'
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
            'values.required' => 'Collected data values are required',
            'collection_date.required' => 'A collection date is required',
            'indicator_id.required' => 'A indicator date is required',
        ];
    }
}
