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
            'notes' => '',
            'file_name' => '',
            'collected_data_file' => '', //mimes:pdf,csv,doc,xml,docx,txt,ppt,pptx,odf,odt,html,xls,xlsx,jpg,mp4,mp3,jpeg,png,gif,zip,rar,avi,mov,flv,wav
            'collection_date' => 'required|date',
            'budget' => 'nullable|integer',
            'amount_spent' => 'nullable|integer',
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
            'indicator_id.required' => 'An indicator is required',
        ];
    }
}
