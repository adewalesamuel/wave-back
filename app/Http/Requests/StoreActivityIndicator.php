<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivityIndicator extends FormRequest
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
            'activity_id' => 'required|integer|exists:activities,id',
            'indicator_id' => 'required|integer|exists:indicators,id',
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
            'activity_id.required' => 'An activity is required',
            'indicator.required' => 'An indicator is required',
        ];
    }
}
