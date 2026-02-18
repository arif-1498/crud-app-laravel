<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
             'post_id' => 'required|exists:posts,id',
            'user_id' => 'required|exists:users,id',
            'body' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'post_id.required' => 'Post ID is required',
            'post_id.exists' => 'Post is no longer exist',
            'user_id.required' => 'User ID is required',
            'user_id.exists' => 'User does not exist',
            'body.required' => 'Comment body is required',
            'body.string' => 'Comment body must be a string',
        ];
    }
}
