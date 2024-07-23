<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Base64ImageCheckRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $image;
    public function __construct($image)
    {
        $this->image    = $image;
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
        return base64_encode(base64_decode($this->image, true)) !== $this->image;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Verification photo must be a valid base64-encoded image.';
    }
}
