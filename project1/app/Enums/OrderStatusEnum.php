<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
/**
 * @method static self shipping()
 * @method static self cancelled()
 * @method static self processing()
 * @method static self completed()
 */
final class OrderStatusEnum extends Enum
{
    const processing =   1;
    const shipping =   2;
    const completed =   3;
    const cancelled =   4;
    /**
     * Return a array with all status as key and value
     */
    public static function values(): array
    {
        return [
            'processing' => 1,
            'shipping' => 2,
            'completed' => 3,
            'cancelled' => 4,
        ];
    }
    public static function types():array
    {
        return [
            'all'=>'all',
            'trashed'=>'trashed'
        ];
    }
}
