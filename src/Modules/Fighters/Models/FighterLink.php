<?php

declare(strict_types=1);

namespace Modules\Fighters\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CustomModel;

/**
 * @property string $id
 * @property string $tapology_url
 * @property string $cagematch_url
 * @property string $ufc_url
 */
class FighterLink extends CustomModel
{
    use HasUlids;
    use HasFactory;

    protected $fillable = [
        'fighter_id',
        'tapology_url',
        'cagematch_url',
        'ufc_url',
    ];
}
