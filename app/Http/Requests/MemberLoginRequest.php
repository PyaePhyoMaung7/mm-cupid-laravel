<?php

namespace App\Http\Requests;

use App\Rules\MemberStatusCheck;
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
            ],
            'password' => [
                'required',
                new MemberStatusCheck($this->email, $this->password),
            ]
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Please fill username',
            'password.required' => 'Please fill password',
        ];
    }
}
