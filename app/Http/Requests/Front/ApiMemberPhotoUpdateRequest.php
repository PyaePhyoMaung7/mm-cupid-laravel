<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class ApiMemberPhotoUpdateRequest extends FormRequest
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
            'sort' => [
                'required',
                'integer'
            ],
            'file' => [
                'required',
                'mimes:jpg,jpeg,png,gif,webp',
                'max:2048',
            ],
        ];
    }

    public function messages()
    {
        return [
           'sort.required'  => 'Please include an image sort number.',
           'sort.integer'   =>'Image number must be an integer',
           'file.mimes'     => 'Invalid image format.<br> Only jpg, jpeg, png, gif, webp photos are allowed.',
           'file.max'       => 'File size can be 2mb maximum.',
        ];
    }
}
