<?php

namespace App\Rules;

use Config;
use Illuminate\Contracts\Validation\Rule;

class ImgHeight implements Rule
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
        $height = imagesy($value);
        $heightRule = Config::get('utils.imageRule.height');

        //高さが既定値より大きいまたは小さい
        if($height<($heightRule-20)||$height>($heightRule+20)) return false;

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '画像の高さが大きすぎるか、または小さすぎます。';
    }
}
