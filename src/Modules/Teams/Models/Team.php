<?php

namespace Modules\Teams\Models;

use Database\Factories\TeamFactory;
use Illuminate\Database\Query\Builder as QueryBuilder;
use  \Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\CustomModel;
use Modules\Teams\Builders\TeamQueryBuilder;

/**
 * @property string $id
 * @property string $user_id
 * @property string $name
 */

class Team extends CustomModel
{
    use HasUlids;
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function newEloquentBuilder($query): TeamQueryBuilder
    {
        return new TeamQueryBuilder($query);
    }

    public static function newFactory(): TeamFactory
    {
        return TeamFactory::new();
    }
}
