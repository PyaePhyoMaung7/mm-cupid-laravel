<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'username' => [
                'required',
                Rule::unique('users', 'username')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
                'regex:/^[a-zA-Z0-9_]+$/'
            ],
            'role' => [
                'required',
                'integer'
            ],
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
            'username.required' => 'Please fill username',
            'username.unique' => 'The username you entered already exists',
            'username.regex' => 'Username can contain only letters, numbers and underscores',
            'role.required' => 'Please select user role',
            'role.integer' => 'User role must be a number',
            'password.required' => 'Please fill password',
            'password.min' => 'Password must contain at least 6 characters',
            'confirm-password.required' => 'Please fill confirm password',
            'confirm-password.same' => 'Password and confirm password do not match',
        ];
    }
}
