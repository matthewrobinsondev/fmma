<?php

use App\Models\Team;

test('Get Test Api Successful response', function () {
    Team::factory()->create([
        'id' => 15,
        'name' => 'Test Team',
    ]);

    $response = $this->get('/api/team/15')
        ->assertSuccessful()
        ->assertJson([
            'data' => [
                'id' => 15,
                'name' => 'Test Team',
                'deleted_at' => null,
            ]
        ]);
});

test('Get Test Api Unsuccessful response', function () {
    $response = $this->get('/api/team/15')
        ->assertStatus(404)
        ->assertJson(['message' => 'Team could not be found.']);
});
