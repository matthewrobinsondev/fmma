<?php

declare(strict_types=1);

namespace App\Http\Controllers\App;

use App\Http\Requests\TeamStoreRequest;
use App\Models\User;
use Modules\Teams\DataTransferObjects\TeamDto;
use Modules\Teams\Exceptions\TeamException;
use Modules\Teams\Interfaces\TeamServiceInterface;
use Modules\Teams\Resources\TeamResource;

class TeamController
{
    public function __construct(
        protected TeamServiceInterface $service
    ) {
    }

    /**
     * @throws TeamException
     */
    public function store(TeamStoreRequest $request): TeamResource
    {
        /** @var User $user */
        $user = $request->user();

        if ($user->team()->exists()) {
            throw TeamException::userCantHaveMultipleTeams();
        }

        /** @var string $name */
        $name = $request->validated('name');

        $team = $this->service->store($user, new TeamDto(name: $name));

        return TeamResource::make($team);
    }
}
