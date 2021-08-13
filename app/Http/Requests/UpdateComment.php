<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Comment;

class UpdateComment extends FormRequest
{
     /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {   
        $comment = Comment::where('id', $this->route('comment'))
        ->where('user_id', $this->user()->id());

        return !$comment ? false : true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'post_id' => 'required|integer',
            'comment' => 'required|text',
            'user_id' => 'required|exists:users'
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
            'post_id.required' => 'A post is required',
            'comment.required' => 'A coment is required',
            'user_id.required' => 'A user is required',
        ];
    }
}
