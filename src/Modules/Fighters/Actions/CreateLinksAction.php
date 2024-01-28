<?php

namespace Modules\Fighters\Actions;

use Illuminate\Support\Facades\DB;
use Modules\Fighters\DataTransferObjects\FighterDto;
use Modules\Fighters\Models\Fighter;
use Modules\Fighters\Models\FighterLink;

class CreateLinksAction
{
    public function execute(Fighter $fighter, FighterDto $dto): void
    {
        FighterLink::query()->create(
            [
                'fighter_id' => $fighter->id,
                'tapology_url' => $dto->tapology_url,
                'cagematch_url' => $dto->cagematch_url,
                'ufc_url' => $dto->ufc_url,
            ]
        );
    }
}
