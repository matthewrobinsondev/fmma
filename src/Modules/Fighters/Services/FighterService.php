<?php

declare(strict_types=1);

namespace Modules\Fighters\Services;

use App\Models\User;
use Modules\Fighters\DataTransferObjects\FighterDto;
use Modules\Fighters\Interfaces\FighterServiceInterface;
use Modules\Fighters\Models\Fighter;

class FighterService implements FighterServiceInterface
{
    public function store(User $user, FighterDto $dto): Fighter
    {
        /**
         * @var Fighter $fighter
         * @todo revisit this in the future
         */
        $fighter =  Fighter::query()->updateOrCreate([
            'user_id' => $user->id,
            'name' => $dto->name
        ], [
            'name' => $dto->name
        ]);

        return $fighter;
    }
}
