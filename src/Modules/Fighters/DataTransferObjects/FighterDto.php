<?php

declare(strict_types=1);

namespace Modules\Fighters\DataTransferObjects;

class FighterDto
{
    public function __construct(
        public readonly string $name,
    ) {
    }
}
