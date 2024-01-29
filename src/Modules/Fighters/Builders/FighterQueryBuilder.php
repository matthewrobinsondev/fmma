<?php

declare(strict_types=1);

namespace Modules\Fighters\Builders;

use Illuminate\Database\Eloquent\Builder;

class FighterQueryBuilder extends Builder
{
    public function withRecord(): self
    {
        return $this->leftJoin('fighter_records', 'fighter_id', '=', 'id');
    }
}
