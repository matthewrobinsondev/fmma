<?php

declare(strict_types=1);

namespace Modules\Fighters\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Fighters\Enums\Gender;
use Modules\Fighters\Models\FighterLink;
use Modules\Fighters\Models\FighterNickname;
use Modules\Fighters\Models\FighterRecord;

/**
 * @property string $first_name
 * @property ?string $last_name
 * @property FighterNickname[] $nicknames
 * @property FighterRecord $record
 * @property FighterLink $links
 * @property Gender $gender
 * @property string $nationality
 * @property string $fighting_out_of
 * @property ?string $affiliation
 * @property string $date_of_birth
 * @property ?string $image_url
 */
class FighterResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'nationality' => $this->nationality,
            'fighting_out_of' => $this->fighting_out_of,
            'affiliation' => $this->affiliation,
            'date_of_birth' => $this->date_of_birth,
            'image_url' => $this->image_url,
            'nicknames' => $this->nicknames,
            'links' => $this->links,
            'record' => $this->record
        ];
    }
}
