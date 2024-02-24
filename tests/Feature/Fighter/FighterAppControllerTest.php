<?php

declare(strict_types=1);

namespace Tests\Feature\Fighter;

use Tests\FeatureTestCase;

class FighterAppControllerTest extends FeatureTestCase
{
    public function testCreateFighter(): void
    {
        $this->signIn();

        $response = $this->post('/fighter', [
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'gender' => fake()->randomElement(['Male', 'Female']),
            'nationality' => fake()->country,
            'fighting_out_of' => fake()->city,
            'affiliation' => fake()->company,
            'date_of_birth' => fake()->date('Y-m-d', '-18 years'),
            'image_url' => fake()->imageUrl,
            'wins' => fake()->numberBetween(0, 50),
            'losses' => fake()->numberBetween(0, 50),
            'draws' => fake()->numberBetween(0, 50),
            'nicknames' => [fake()->word, fake()->word],
            'tapology_url' => fake()->url,
            'cagematch_url' => fake()->url,
            'ufc_url' => fake()->url,
        ]);

        $response
            ->assertCreated();

        dd($response->json());
    }
}
