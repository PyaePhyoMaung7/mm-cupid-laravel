<?php

namespace App\Http\Requests\Front;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\MemberPasswordResetLinkCheckRule;

class PasswordResetCodeRequest extends FormRequest
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
            'code' => [
                'required',
                Rule::exists('members', 'password_reset_code')
                    ->where(function ($query) {
                        return $query->whereNull('deleted_at');
                    }),
                new MemberPasswordResetLinkCheckRule($this->code),
                'min:32',
                'max:32',
            ]
        ];
    }

    public function messages()
    {
        return [
            'code.required'     => 'Please fill password reset code',
            'code.min'          => 'Invalid password reset code',
            'code.max'          => 'Invalid password reset code',
            'email.email'       => 'Invalid email',
            'email.exists'      => 'Email not found in our database',
        ];
    }
}
