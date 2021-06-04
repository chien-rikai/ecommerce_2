<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserStatus extends Enum
{
    const active =   0;
    const blocked =   1;
    public static function getValue(string $key)
    {
        if($key=="active")
            return 0;
        else return 1;    
    }
}
