<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            "title"=> "required|string|max:255",
            "body"=> "required|string",
            "image"=> "required|image|mimes:jpeg,png,jpg,gif,svg",
        ];
    }

    public function messages(){
        return [
            "title.required"=> "Title is required",
            "title.string"=> "Title must be string",
            "title.max"=> "Title must be less than 255 characters",
            "body.required"=> "Body is required",
            "body.string"=> "Body must be string",
            "image.required"=> "Image is required",
            "image.image"=> "File must be image",
            "image.mimes"=> "Image must be in jpeg,png,jpg,gif,svg format",
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->id(),
        ]);
    }
}
