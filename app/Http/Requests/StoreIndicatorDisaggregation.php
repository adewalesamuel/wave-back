<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIndicatorDisaggregation extends FormRequest
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
            'indicator_id' => 'required|integer|exists:indicators,id',
            'disaggregation_id' => 'required|integer|exists:disaggregations,id',
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
            'indicator_id.required' => 'An indicator is required',
            'disaggregation.required' => 'A disaggregation is required',
        ];
    }
}
