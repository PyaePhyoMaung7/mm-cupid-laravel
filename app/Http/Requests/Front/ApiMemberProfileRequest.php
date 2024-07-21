<?php

namespace App\Http\Requests\Front;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ApiMemberProfileRequest extends FormRequest
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
            'id' => [
                'required',
                'integer',
                Rule::exists('members', 'id')
                ->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
            ]
        ];
    }

    public function messages()
    {
        return [
            'id.required'       => 'Member id is required',
            'id.integer'        => 'Member id must be a number',
            'id.exists'         => 'Invalid member id',
        ];
    }
}
