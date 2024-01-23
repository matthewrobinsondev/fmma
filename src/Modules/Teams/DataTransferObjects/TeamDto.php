<?php

declare(strict_types=1);

namespace Modules\Teams\DataTransferObjects;

class TeamDto
{
    public function __construct(
        public readonly string $name,
    ) {
    }
}
