<?php

namespace App\Rules;

use Config;
use Illuminate\Contracts\Validation\Rule;

class ImgWidth implements Rule
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
        $width = imagesx($value);
        $widthRule = Config::get('utils.imageRule.width');

        //高さが既定値より大きいまたは小さい
        if($width<($widthRule-20)||$width>($widthRule+20)) return false;

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '画像の幅が大きすぎるか、または小さすぎます。';
    }
}
