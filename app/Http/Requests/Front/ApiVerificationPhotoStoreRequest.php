<?php

namespace App\Http\Requests\Front;

use App\Rules\Base64ImageCheckRule;
use Illuminate\Foundation\Http\FormRequest;

class ApiVerificationPhotoStoreRequest extends FormRequest
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
            'src' => [
                'required',
                'string',
                new Base64ImageCheckRule($this->src),
            ]
        ];
    }

    public function messages()
    {
        return [
            'src.required'      => 'Please send verification photo',
            'src.string'        => 'The photo must be a string',
        ];
    }
}
