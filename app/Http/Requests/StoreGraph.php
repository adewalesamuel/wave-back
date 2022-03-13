<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGraph extends FormRequest
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
            'type' => 'required|string',
            'indicators' => 'required|json',
            'project_id' => 'required|integer|exists:projects,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages() {
        return [
            'name.required' => "A name is required",
            'type.required' => "A type is required",
            'indicators.required' => "At least 1 indicator is required",
            'project_id.required' => "A project is required",
        ];
    }
}
