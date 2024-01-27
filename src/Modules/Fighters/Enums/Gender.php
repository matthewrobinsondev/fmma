<?php

declare(strict_types=1);

namespace Modules\Fighters\Enums;

enum Gender: string
{
    case MALE = 'male';
    case FEMALE = 'female';

    /**
     * @return array<int, string>
     */
    public static function toArray(): array
    {
        return array_column(Gender::cases(), 'value');
    }
}
