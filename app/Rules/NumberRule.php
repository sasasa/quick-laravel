<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NumberRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(int $n)
    {
        $this->num = $n;
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
        return $value % $this->num == 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->num. 'で割り切れる値が必要です。';
    }
}
