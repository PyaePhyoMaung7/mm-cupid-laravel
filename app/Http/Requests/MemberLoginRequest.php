<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Rules\MemberStatusCheckRule;
use Illuminate\Foundation\Http\FormRequest;

class MemberLoginRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
                Rule::exists('members', 'email'),
            ],
            'password' => [
                'required',
                new MemberStatusCheckRule($this->email, $this->password),
            ]
        ];
    }

    public function messages()
    {
        return [
            'email.required'    => 'Please fill your email address',
            'email.email'       => 'Invalid email address',
            'email.exists'      => 'Email cannot be found',
            'password.required' => 'Please fill password',

        ];
    }
}
