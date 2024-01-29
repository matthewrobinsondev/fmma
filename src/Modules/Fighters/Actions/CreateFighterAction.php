<?php

declare(strict_types=1);

namespace Modules\Fighters\Actions;

use Modules\Fighters\DataTransferObjects\FighterDto;
use Modules\Fighters\Models\Fighter;

class CreateFighterAction
{
    public function execute(FighterDto $fighterDto): Fighter
    {
        /** @var Fighter $fighter */
        $fighter = Fighter::query()
            ->create([
                'first_name' => $fighterDto->first_name,
                'last_name' => $fighterDto->last_name,
                'gender' => $fighterDto->gender,
                'affiliation' => $fighterDto->affiliation,
                'date_of_birth' => $fighterDto->date_of_birth,
                'image_url' => $fighterDto->image_url,
                'nationality' => $fighterDto->nationality,
                'fighting_out_of' => $fighterDto->fighting_out_of,
            ]);

        return $fighter;
    }
}
