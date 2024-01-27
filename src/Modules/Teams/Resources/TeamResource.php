<?php

declare(strict_types=1);

namespace Modules\Teams\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    /**
     * @return array{name: mixed}
     * @todo fix requests
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $request->name
        ];
    }
}
