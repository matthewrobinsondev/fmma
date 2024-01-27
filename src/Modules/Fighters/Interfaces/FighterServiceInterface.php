<?php

declare(strict_types=1);

namespace Modules\Fighters\Interfaces;

use App\Models\User;
use Modules\Fighters\DataTransferObjects\FighterDto;
use Modules\Fighters\Models\Fighter;

interface FighterServiceInterface
{
    public function store(User $user, FighterDto $dto): Fighter;
}
