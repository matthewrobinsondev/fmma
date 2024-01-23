<?php

namespace Modules\Teams\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    protected string $name;

    /**
     * @return array{name: string}
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name
        ];
    }
}
