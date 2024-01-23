<?php

namespace Modules\Teams\Interfaces;

use App\Models\User;
use Modules\Teams\DataTransferObjects\TeamDto;
use Modules\Teams\Models\Team;

interface TeamServiceInterface
{
    public function store(User $user, TeamDto $dto): Team;
}
