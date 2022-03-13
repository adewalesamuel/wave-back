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
            'description' => '',
            'type' => 'string',
            'direction' => 'string',
            'baseline' => 'integer',
            'target' => 'integer',
            'unit' => 'string',
            'project_id' => 'integer|required|exists:projects,id',
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
            'name.required' => 'An indicator name is required',
            'project_id.required' => 'A project is required',
        ];
    }
}
