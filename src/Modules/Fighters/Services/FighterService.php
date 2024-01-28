<?php

declare(strict_types=1);

namespace Modules\Fighters\Services;

use Modules\Fighters\Actions\CreateFighterAction;
use Modules\Fighters\Actions\CreateLinksAction;
use Modules\Fighters\Actions\CreateNicknameAction;
use Modules\Fighters\Actions\CreateRecordAction;
use Modules\Fighters\DataTransferObjects\FighterDto;
use Modules\Fighters\Interfaces\FighterServiceInterface;
use Modules\Fighters\Models\Fighter;

class FighterService implements FighterServiceInterface
{
    public function __construct(
        private readonly CreateFighterAction $createFighterAction,
        private readonly CreateRecordAction $createRecordAction,
        private readonly CreateLinksAction $createLinksAction,
        private readonly CreateNicknameAction $createNicknameAction,
    )
    {
    }

    public function store(FighterDto $dto): Fighter
    {
        $fighter = $this->createFighterAction->execute($dto);

        $this->createRecordAction->execute($fighter, $dto);
        $this->createLinksAction->execute($fighter, $dto);
        $this->createNicknameAction->execute($fighter, $dto);
        // create log

        return $fighter->load(['record', 'links', 'nicknames']);
    }
}
