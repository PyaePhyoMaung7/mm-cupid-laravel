<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRegisterRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
                'unique:members'
            ],
            'password' => [
                'required',
                'min:6'
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
            'min_age' => [
                'required',
            ],
            'max_age' => [
                'required',
            ],
            'work' => [
                'required',
            ],
            'religion' => [
                'required',
            ]
        ];
    }

    public function messages()
    {
        return [
            'username.required'         => 'Please fill username',
            'email.required'            => 'Please fill your email address',
            'email.email'               => 'Invalid email address',
            'email.unique'              => 'Email already exists',
            'password.required'         => 'Please fill password',
            'password.min'              => 'Password must contain at least 6 characters',
            'phone.required'            => 'Please fill your phone number',
            'gender.required'           => 'Please choose your gender',
            'gender.integer'            => 'Gender must be a number',
            'birthday.required'         => 'Please choose your date of birth',
            'education.required'        => 'Please fill your education level',
            'city.required'             => 'Please choose your city',
            'hfeet.required'            => 'Please choose your height (feet)',
            'hfeet.integer'             => 'Height (feet) must be a number',
            'hinches.required'          => 'Please choose your height (inches)',
            'hinches.integer'           => 'Height (inches) must be a number',
            'about.required'            => 'Please tell something about yourself',
            'partner_gender.required'   => 'Please choose your preferred partner gender',
            'min_age.required'          => "Please choose your partner's minimum age",
            'min_age.integer'           => "Partner minimum age must be a number",
            'max_age.required'          => "Please choose your partner's maximum age",
            'max_age.required'          => "Partner maximum age must be a number",
            'work.required'             => "Please fill your occupation",
            'religion.required'         => "Please choose your religion",
            'religion.integer'          => "Religion must be a number",
        ];
    }
}
