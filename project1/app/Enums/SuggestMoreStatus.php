<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class SuggestMoreStatus extends Enum
{
    const NoProcess =   0;
    const Processed =   1;
}
