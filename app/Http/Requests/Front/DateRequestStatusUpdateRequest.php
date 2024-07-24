<?php

namespace App\Http\Requests\Front;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DateRequestStatusUpdateRequest extends FormRequest
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
                Rule::exists('date_requests', 'id')
                    ->where(function ($query) {
                        return $query->whereNull('deleted_at');
                    }),
                ],
            'status' => [
                'required',
                'integer'
            ]
        ];
    }

    public function messages()
    {
        return [
            'id.required'       => 'Date Reqeust id is required',
            'id.integer'        => 'Date Reqeust id must be a number',
            'id.exists'         => 'Date Reqeust id cannot be found',
            'status.required'   => 'Date Reqeust status is required',
            'status.integer'    => 'Date Reqeust status must be a number',
        ];
    }
}
