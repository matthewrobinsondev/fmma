<?php

declare(strict_types=1);

namespace Modules\Fighters\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FighterResource extends JsonResource
{
    /**
     * @return array{name: mixed}
     * @todo fix requests
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $request->input('name')
        ];
    }
}
