<?php

declare(strict_types=1);

namespace Tests\Feature\Team;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Livewire\Volt\Volt;
use Modules\Teams\Exceptions\TeamException;
use Modules\Teams\Models\Team;
use Tests\FeatureTestCase;

class TeamAppControllerTest extends FeatureTestCase
{
    public function testCreateTeamViaName(): void
    {
        $this->signIn();
        $name = fake()->userName;

        $response = $this->post('/team', [
            'name' => $name,
        ]);

        $response
            ->assertCreated()
            ->assertJson([
                'data' => [
                    'name' => $name,
                ],
            ]);
    }

    public function testCreateTeamDuplicateNameError(): void
    {
        $this->signIn();

        $name = fake()->userName;
        Team::factory()->create(['name' => $name]);

        $this->post('/team', ['name' => $name])
            ->assertFound()
            ->assertInvalid([
                'name' => 'The name has already been taken.',
            ]);
    }

    public function testCreateTeamDuplicateUserError(): void
    {
        $this->signIn()->createTeam(name: 'Existing Team');

        $name = fake()->userName;

        $this->post('/team', ['name' => $name])
            ->assertForbidden()
            ->assertJson(['error' => 'User already has a team.']);
    }
}
