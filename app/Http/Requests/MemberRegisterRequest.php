<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class MemberRegisterRequest extends BaseFormRequest
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
            ],
            'upload1' => [
                'required',
                'mimes:jpg,jpeg,png,gif,webp',
                'max:2048',
            ],
            'upload2' => [
                'nullable',
                'mimes:jpg,jpeg,png,gif,webp',
                'max:2048',
            ],
            'upload3' => [
                'nullable',
                'mimes:jpg,jpeg,png,gif,webp',
                'max:2048',
            ],
            'upload4' => [
                'nullable',
                'mimes:jpg,jpeg,png,gif,webp',
                'max:2048',
            ],
            'upload5' => [
                'nullable',
                'mimes:jpg,jpeg,png,gif,webp',
                'max:2048',
            ],
            'upload6' => [
                'nullable',
                'mimes:jpg,jpeg,png,gif,webp',
                'max:2048',
            ],
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
            'upload1.required'          => "Please upload a photo for image 1.",
            'upload1.mimes'             => 'Invalid image for image 1.<br> Only jpg, jpeg, png, gif, webp photos are allowed.',
            'upload1.max'               => 'File size can be 2mb maximum for image 1.',
            'upload2.mimes'             => 'Invalid image for image 2.<br> Only jpg, jpeg, png, gif, webp photos are allowed.',
            'upload2.max'               => 'File size can be 2mb maximum for image 2.',
            'upload3.mimes'             => 'Invalid image for image 3.<br> Only jpg, jpeg, png, gif, webp photos are allowed.',
            'upload3.max'               => 'File size can be 2mb maximum for image 3.',
            'upload4.mimes'             => 'Invalid image for image 4.<br> Only jpg, jpeg, png, gif, webp photos are allowed.',
            'upload4.max'               => 'File size can be 2mb maximum for image 4.',
            'upload5.mimes'             => 'Invalid image for image 5.<br> Only jpg, jpeg, png, gif, webp photos are allowed.',
            'upload5.max'               => 'File size can be 2mb maximum for image 5.',
            'upload6.mimes'             => 'Invalid image for image 6.<br> Only jpg, jpeg, png, gif, webp photos are allowed.',
            'upload6.max'               => 'File size can be 2mb maximum for image 6.',
        ];
    }
}
