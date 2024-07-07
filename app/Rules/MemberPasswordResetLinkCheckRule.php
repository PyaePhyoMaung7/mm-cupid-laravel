<?php

namespace App\Rules;

use Carbon\Carbon;
use App\Models\Member;
use Illuminate\Contracts\Validation\Rule;

class MemberPasswordResetLinkCheckRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $code;
    public function __construct($code)
    {
        $this->code    = $code;
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
        $result     = Member::select('password_reset_code_sent_at')
                            ->where('password_reset_code', '=', $this->code)
                            ->first();
        $sent_dt    = $result->password_reset_code_sent_at;
        $today_dt   = Carbon::now();
        $sent_dt    = Carbon::parse($sent_dt);
        if ($today_dt->diffInHours($sent_dt) <= 24) {
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
        return 'The passwod reset link has expired.';
    }
}
