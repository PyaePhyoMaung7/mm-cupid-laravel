<?php

namespace App\Http\Requests\Front;

use App\Constant;
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
                'integer',
                'min:0'
            ],
            'partner_gender' => [
                'nullable',
                'integer',
                'min:' . Constant::PARTNER_GENDER_MALE,
                'max:' . Constant::PARTNER_GENDER_BOTH,
            ],
            'min_age' => [
                'nullable',
                'integer',
                'min:' . Constant::MIN_AGE,
                'max:' . Constant::MAX_AGE,
            ],
            'max_age' => [
                'nullable',
                'integer',
                'min:' . Constant::MIN_AGE,
                'max:' . Constant::MAX_AGE,
            ]
        ];
    }

    public function messages()
    {
        return [
            'page.required'             => 'There must be a page number',
            'page.integer'              => 'Page number must be a number',
            'page.min'                  => 'Page number must be at least 0',
            'partner_gender.integer'    => 'Partner gender number must be a number',
            'partner_gender.min'        => 'Partner gender must be at least 0, meaning male',
            'partner_gender.max'        => 'Partner gender can be at most 2, meaning both genders',
            'min_age.integer'           => 'Partner min age must be a number',
            'min_age.min'               => 'Partner min age must be at least 18',
            'min_age.max'               => 'Partner min age can be at most 55',
            'max_age.integer'           => 'Partner max age must be a number',
            'max_age.min'               => 'Partner max age must be at least 18',
            'max_age.max'               => 'Partner max age can be at most 55'
        ];
    }
}
