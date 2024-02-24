<?php

declare(strict_types=1);

namespace Modules\Fighters\Interfaces;

use Modules\Fighters\DataTransferObjects\FighterDto;
use Modules\Fighters\Models\Fighter;

interface FighterServiceInterface
{
    public function store(FighterDto $dto): Fighter;
}
