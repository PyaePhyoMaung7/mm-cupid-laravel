<?php

namespace App\Http\Requests\Front;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PasswordResetLinkRequest extends FormRequest
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
                Rule::exists('members', 'email')
                ->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
            ]
        ];
    }

    public function messages()
    {
        return [
            'email.required'    => 'Please fill your email address',
            'email.email'       => 'Invalid email',
            'email.exists'      => 'Email not found in our database',
        ];
    }
}
