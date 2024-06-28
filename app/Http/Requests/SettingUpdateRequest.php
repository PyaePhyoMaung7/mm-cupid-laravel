<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
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
            'point' => [
                'required',
                'integer',
                'min:0'
            ],
            'company-name' => [
                'required',
            ],
            'company-email' => [
                'required',
                'email:rfc,dns',
            ],
            'company-phone' => [
                'required',
            ],
            'company-address' => [
                'required',
            ],
            'company-logo' => [
                'nullable',
                'mimes:jpg,jpeg,png,gif,webp,avif',
                'max:2048',
            ]
        ];
    }

    public function messages()
    {
        return [
            'point.required'            => 'Please fill default points',
            'point.integer'             => 'Points must be a number',
            'point.min'                 => 'Points cannot be negative',
            'company-name.required'     => 'Please fill company name',
            'company-email.required'    => 'Please fill company email',
            'company-email.email'       => 'Invalid email',
            'company-phone.required'    => 'Please fill company phone',
            'company-address.required'  => 'Please fill company address',
            'company-logo.mimes'        => 'Only jpg, jpeg, png, gif, webp and avif files are allowed',
            'company-logo.max'          => 'Company logo file size can be 2mb maximum',
        ];
    }
}
