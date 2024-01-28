<?php

namespace Modules\Fighters\Actions;

use Illuminate\Support\Facades\DB;
use Modules\Fighters\DataTransferObjects\FighterDto;
use Modules\Fighters\Models\Fighter;
use Modules\Fighters\Models\FighterNickname;

class CreateNicknameAction
{
    public function execute(Fighter $fighter, FighterDto $dto): void
    {
        if (!empty($dto->nicknames)) {
            $fighter->nicknames()->createMany($this->getNicknames($fighter, $dto->nicknames));
        }
    }

    /**
     * @param string[] $dtoNicknames
     * @return array<int<0, max>, array<string, string>>
     */
    private function getNicknames(Fighter $fighter, array $dtoNicknames): array
    {
        $nicknames = [];

        foreach ($dtoNicknames as $nickname) {
            $nicknames[] = [
                'fighter_id' => $fighter->id,
                'nickname' => $nickname,
            ];
        }

        return $nicknames;
    }
}