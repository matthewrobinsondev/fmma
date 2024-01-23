<?php

namespace Modules\Teams\Builders;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class TeamQueryBuilder extends Builder
{
    public function forUser(User $user): self
    {
        return $this->where('user_id', $user->id);
    }
}
