<?php

declare(strict_types=1);

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Modules\Teams\Models\Team;

abstract class FeatureTestCase extends TestCase
{
    use LazilyRefreshDatabase;

    protected User $currentUser;
    protected Team $currentTeam;

    protected function signIn(User $user = null, $api = false): self
    {
        if (!$user) {
            $user = User::factory()->create();
        }

        $this->currentUser = $user;

        return $this->actingAs($user, $api ? 'api' : 'web');
    }

    protected function createTeam(User $user = null, string $name = null): self
    {
        if (!$user) {
            $user = $this->currentUser ?? $this->signIn();
        }

        if (!$name) {
            $name = fake()->userName;
        }

        $this->currentTeam = Team::factory()->for($user)->create([ 'name' => $name ]);

        return $this;
    }
}
