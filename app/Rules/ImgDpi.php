<?php

namespace App\Rules;

use Config;
use Illuminate\Contracts\Validation\Rule;

class ImgDpi implements Rule
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
        $dpis = imageresolution($value);
        $dpisRule = Config::get('utils.dpi');

        //画像解像度が既定値より小さい
        if($dpis[0]!==$dpis[1] || $dpis[0]!==$dpisRule) return false;

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '画像の解像度が既定値未満です。';
    }
}
