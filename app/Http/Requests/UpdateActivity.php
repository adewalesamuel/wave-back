<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActivity extends FormRequest
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
            'status' => 'string',
            'start_date' => 'date|required',
            'end_date' => 'date|required',
            'amount_spent' => 'integer',
            'budget' => 'integer',
            'activity_id' => 'integer',
            'user_id' => 'integer',
            'project_id' => 'required|integer',
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
            'name.required' => 'An activity name is required',
            'start_date.required' => 'An start date is required',
            'end_date.required' => 'An end date is required',
            'project_id.required' => 'An project is required',
        ];
    }
}
