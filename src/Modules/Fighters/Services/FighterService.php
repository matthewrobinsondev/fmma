<?php

declare(strict_types=1);

namespace Modules\Fighters\Services;

use Modules\Fighters\DataTransferObjects\FighterDto;
use Modules\Fighters\Interfaces\FighterServiceInterface;
use Modules\Fighters\Models\Fighter;

class FighterService implements FighterServiceInterface
{
    public function store(FighterDto $dto): Fighter
    {
        dd($dto->first_name);

        // Split creation into actions?

        return $fighter;
    }
}
