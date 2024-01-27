<?php

declare(strict_types=1);

namespace Modules\Fighters\Models;

use Database\Factories\TeamFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\CustomModel;
use Modules\Fighters\Builders\FighterQueryBuilder;
use Modules\Fighters\Enums\Gender;

class Fighter extends CustomModel
{
    use HasUlids;
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'nationality',
        'fighting_out_of',
        'affiliation',
        'date_of_birth',
        'image_url',
    ];

    protected $casts = [
        'gender' => Gender::class,
    ];

    public function newEloquentBuilder($query): FighterQueryBuilder
    {
        return new FighterQueryBuilder($query);
    }

    public static function newFactory(): TeamFactory
    {
        return TeamFactory::new();
    }
}
