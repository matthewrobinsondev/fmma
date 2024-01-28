<?php

declare(strict_types=1);

namespace Modules\Fighters\Models;

use Database\Factories\TeamFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\CustomModel;
use Modules\Fighters\Builders\FighterQueryBuilder;
use Modules\Fighters\Enums\Gender;

/**
 * @property string $id
 * @property string $fighter_id
 * @property string $nickname
 */
class FighterNickname extends CustomModel
{
    use HasUlids;
    use HasFactory;

    protected $fillable = [
        'fighter_id',
        'nickname',
    ];

    public function fighter(): BelongsTo
    {
        return $this->belongsTo(Fighter::class);
    }
}