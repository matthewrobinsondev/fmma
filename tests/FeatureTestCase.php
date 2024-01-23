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

    protected function signIn(User $user = null, $api = false): self
    {
        if (!$user) {
            $user = User::factory()->create();
        }

        $this->currentUser = $user;

        return $this->actingAs($user, $api ? 'api' : 'web');
    }
}
