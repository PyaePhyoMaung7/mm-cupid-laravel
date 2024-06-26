<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPasswordUpdateRequest extends FormRequest
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
            'password' => [
                'required',
                'min:6'
            ],
            'confirm-password' => [
                'required',
                'same:password'
            ]
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Please fill password',
            'password.min' => 'Password must contain at least 6 characters',
            'confirm-password.required' => 'Please fill confirm password',
            'confirm-password.same' => 'Password and confirm password do not match',
        ];
    }
}
