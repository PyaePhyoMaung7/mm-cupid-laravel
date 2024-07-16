<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class ApiMemberUpdateRequest extends FormRequest
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
            'username' => [
                'required'
            ],
            'phone' => [
                'required',
            ],
            'gender' => [
                'required',
                'integer'
            ],
            'birthday' => [
                'required',
            ],
            'education' => [
                'required',
            ],
            'city' => [
                'required',
            ],
            'hfeet' => [
                'required',
                'integer'
            ],
            'hinches' => [
                'required',
                'integer'
            ],
            'about' => [
                'required',
            ],
            'partner_gender'=> [
                'required',
            ],
            'partner_min_age' => [
                'required',
            ],
            'partner_max_age' => [
                'required',
            ],
            'work' => [
                'required',
            ],
            'religion' => [
                'required',
            ],
        ];
    }

    public function messages() {
        return [
            'username.required'                 => 'Please fill username',
            'phone.required'                    => 'Please fill your phone number',
            'gender.required'                   => 'Please choose your gender',
            'gender.integer'                    => 'Gender must be a number',
            'birthday.required'                 => 'Please choose your date of birth',
            'education.required'                => 'Please fill your education level',
            'city_id.required'                  => 'Please choose your city',
            'hfeet.required'                    => 'Please choose your height (feet)',
            'hfeet.integer'                     => 'Height (feet) must be a number',
            'hinches.required'                  => 'Please choose your height (inches)',
            'hinches.integer'                   => 'Height (inches) must be a number',
            'about.required'                    => 'Please tell something about yourself',
            'partner_gender.required'           => 'Please choose your preferred partner gender',
            'partner_min_age.required'          => "Please choose your partner's minimum age",
            'partner_min_age.integer'           => "Partner minimum age must be a number",
            'partner_max_age.required'          => "Please choose your partner's maximum age",
            'partner_max_age.required'          => "Partner maximum age must be a number",
            'work.required'                     => "Please fill your occupation",
            'religion.required'                 => "Please choose your religion",
            'religion.integer'                  => "Religion must be a number",
        ];
    }
}
