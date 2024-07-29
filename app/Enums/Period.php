<?php

namespace App\Enums;

use Illuminate\Support\Carbon;

enum Period: string
{
    case Year = 'year';
    case Month = 'mouth';
    case Week = 'week';
    case Day = 'day';
    case Hour = 'hour';

    public function date(): Carbon
    {
        return match ($this) {
            self::Year => now()->startOfYear(),
            self::Month => now()->startOfMonth(),
            self::Week => now()->startOfWeek(),
            self::Day => now()->startOfDay(),
            self::Hour => now()->startOfHour(),
        };
    }
}
