<?php

namespace App\Rules;

use App\Constant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Rule;

class MemberPointCheckRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $point = Auth::guard('member')->user()->point;
        if ($point >= Constant::POINT_PER_DATE_REQEUST) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "You don't have enough point to send date requests";
    }
}
