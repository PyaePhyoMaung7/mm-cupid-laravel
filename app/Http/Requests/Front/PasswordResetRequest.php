<?php

namespace App\Http\Requests\Front;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
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
            'member-id' => [
                'required',
                Rule::exists('members', 'id')
                    ->where(function ($query) {
                        return $query->whereNull('deleted_at');
                }),
            ],
            'password' => [
                'required',
                'min:6',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
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
            'member-id.required'        => 'Member Id cannot be found',
            'member-id.exists'          => 'Member Id cannot be found',
            'password.required'         => 'Please fill password',
            'password.min'              => 'Password must contain at least 6 characters',
            'password.regex'            => 'Password must contain at least 1 small letter, 1 capital letter, \n 1 number and 1 special character',
            'confirm-password.required' => 'Please fill confirm password',
            'confirm-password.same'     => 'Password and confirm password do not match',
        ];
    }
}
