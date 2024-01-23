<?php

namespace Modules\Teams\Services;

use App\Models\User;
use Modules\Teams\DataTransferObjects\TeamDto;
use Modules\Teams\Interfaces\TeamServiceInterface;
use Modules\Teams\Models\Team;

class TeamService implements TeamServiceInterface
{
    public function store(User $user, TeamDto $dto): Team
    {
        /**
         * @var Team $team
         * @todo revisit this in the future
         */
        $team =  Team::query()->updateOrCreate([
            'user_id' => $user->id,
            'name' => $dto->name
        ], [
            'name' => $dto->name
        ]);

        return $team;
    }
}
