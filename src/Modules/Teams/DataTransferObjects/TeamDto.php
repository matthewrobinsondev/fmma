<?php

namespace Modules\Teams\DataTransferObjects;

use App\Http\Requests\TeamStoreRequest;

class TeamDto
{
    public function __construct(
        public readonly string $name,
    ) {
    }
}
