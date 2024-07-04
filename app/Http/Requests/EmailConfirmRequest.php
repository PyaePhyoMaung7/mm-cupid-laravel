<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EmailConfirmRequest extends FormRequest
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
                'string',
                'min:32',
                'max:32',
                'regex:/^[a-zA-Z0-9]+$/',
                Rule::exists('members', 'email_confirm_code')
                    ->where(function ($query) {
                        return $query->whereNull('deleted_at');
                    }),
            ],
        ];
    }

    public function messages()
    {
        return [
            'code.required'     => 'Email confirm code not found',
            'code.string'       => 'Email confirm code should be a string',
            'code.regex'        => 'Email confirm code can only contains numbers and letters',
            'code.min'          => 'Email confirm code must be exactly 32 characters long',
            'code.max'          => 'Email confirm code must be exactly 32 characters long',
            'code.exists'       => 'Email confirm code cannot be found',
        ];
    }
}
