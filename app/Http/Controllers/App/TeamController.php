<?php

namespace App\Http\Controllers\App;

use App\Http\Requests\TeamStoreRequest;
use App\Models\User;
use Modules\Teams\DataTransferObjects\TeamDto;
use Modules\Teams\Interfaces\TeamServiceInterface;
use Modules\Teams\Resources\TeamResource;
use Modules\Teams\Services\TeamService;

class TeamController
{
    public function __construct(
        protected TeamServiceInterface $service
    )
    {
    }

    public function store(TeamStoreRequest $request): TeamResource
    {
        /** @var User $user */
        $user = $request->user();

        /** @var string $name */
        $name = $request->validated('name');

        $team = $this->service->store($user, new TeamDto(name: $name));

        return TeamResource::make($team);
    }
}
