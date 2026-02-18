<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;


class UpdateUserRequest extends FormRequest
{
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



       
       
        $user_id = request()->id;
        return [
            'name' => 'string|max:255',
             'image' => 'nullable|file|mimes:jpeg,png,jpg,webp,gif|max:10240',
            'email' => ['email', 'unique:users,email,'. $user_id],
            'date_of_birth' => ['required','date_format:Y-m-d','before:'.Carbon::now()->subYears(10)->toDateString()],
            'age' => 'required|integer|min:0',
            'gender' => 'required|string',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be  string',
            'name' => 'must be less than 255 characters',
            'image.required' => 'image is reuqired',
            'image.image' => 'file should be image',
            'image.mimes' => 'image must be in jpeg,png,jpg,webp,gif',
            'email.required' => 'email is required',
            'email.email' => 'must be email',
            'email.unique' => 'email already exist',
            'date_of_birth.required' => ' date of birth is required',
            'date_of_birth.date_formate' => 'Invalid date format!',
            'date_of_birth.before' => 'Date of birth must not be less than 10 years',
            'age.required' => 'age is required',
            'age.intiger' => 'age must be in integer',
            'age.min' => 'age must be greater than zero',
            'gender.required' => 'Gender is required'
        ];
    }
}
