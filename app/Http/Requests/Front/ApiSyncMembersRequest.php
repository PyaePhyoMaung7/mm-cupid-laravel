<?php

namespace App\Http\Requests\Front;

use App\Http\Requests\BaseFormRequest;

class ApiSyncMembersRequest extends BaseFormRequest
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
            'page' => [
                'required',
                'integer'
            ],
            'partner_gender' => [
                'nullable',
                'integer'
            ],
            'min_age' => [
                'nullable',
                'integer'
            ],
            'max_age' => [
                'nullable',
                'integer'
            ]
        ];
    }

    public function messages()
    {
        return [
            'page.required'             => 'There must be a page number',
            'page.integer'              => 'Page number must be a number',
            'partner_gender.integer'    => 'Page number must be a number',
            'min_age.integer'           => 'Page number must be a number',
            'max_age.integer'           => 'Page number must be a number',
        ];
    }
}
