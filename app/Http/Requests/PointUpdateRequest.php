<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PointUpdateRequest extends FormRequest
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
                Rule::exists('member_transactions', 'id')
                ->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
            ],
            'member_id' => [
                'required',
                'integer',
                Rule::exists('members', 'id')
                ->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
            ],
            'point' => [
                'required',
                'integer',
                'min:0'
            ]
        ];
    }

    public function messages()
    {
        return [
            'id.required'               => 'Transaction id is required',
            'id.integer'                => 'Transaction id must be a number',
            'id.exists'                 => 'Invalid transaction id',
            'member_id.required'        => 'Member id is required',
            'member_id.integer'         => 'Member id must be a number',
            'member_id.exists'          => 'Invalid member id',
            'point.required'            => 'Please fill point',
            'point.integer'             => 'Point must be a number',
            'point.min'                 => 'Point cannot be negative'
        ];
    }
}
