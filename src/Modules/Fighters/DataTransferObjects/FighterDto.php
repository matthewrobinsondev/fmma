<?php

declare(strict_types=1);

namespace Modules\Fighters\DataTransferObjects;

class FighterDto
{
    public function __construct(
        public readonly string $first_name,
        public readonly ?string $last_name,
        public readonly string $gender,
        public readonly string $nationality,
        public readonly string $fighting_out_of,
        public readonly ?string $affiliation,
        public readonly string $date_of_birth,
        public readonly ?string $image_url,
        public readonly int $wins,
        public readonly int $losses,
        public readonly int $draws,
        public readonly ?array $nicknames,
        public readonly ?string $tapology_url,
        public readonly ?string $cagematch_url,
        public readonly ?string $ufc_url
    ) {
    }
}
