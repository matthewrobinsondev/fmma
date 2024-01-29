<?php

declare(strict_types=1);

namespace Modules\Fighters\Actions;

use Modules\Fighters\DataTransferObjects\FighterDto;
use Modules\Fighters\Models\Fighter;
use Modules\Fighters\Models\FighterRecord;

class CreateRecordAction
{
    public function execute(Fighter $fighter, FighterDto $dto): void
    {
        FighterRecord::query()->create([
            'fighter_id' => $fighter->id,
            'wins' => $dto->wins,
            'losses' => $dto->losses,
            'draws' => $dto->draws,
        ]);
    }
}
