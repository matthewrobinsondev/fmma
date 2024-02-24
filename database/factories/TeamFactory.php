<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Teams\Models\Team;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Team>
 */
class TeamFactory extends Factory
{
    protected $model = Team::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'user_id' => User::factory(),
        ];
    }
}
