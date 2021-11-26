<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CorrectPasswordRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($realpass)
    {
        //
        $this->realpass = $realpass;
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
        //
        return (password_verify($value, $this->realpass));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Wrong Password';
    }
}
