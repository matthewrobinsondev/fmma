<?php

declare(strict_types=1);

use App\Filament\Resources\UserResource;
use App\Models\User;
use Database\Seeders\RolesAndPermissions;

const ADMIN_USER_ID = 1;
const STANDARD_USER_ID = 2;

beforeEach(function () {
    $this->seed(RolesAndPermissions::class);
});

describe('Assert Status Codes on User Permissions', function () {

    test('Check Admin Route Permissions', function (int $id, int $statusCode) {
        $this->actingAs(User::query()->find($id));
        $response = $this->get('/admin');
        $response->assertStatus($statusCode);
    });

    it('Create User Route Permissions', function (int $id, int $statusCode) {
        $this->actingAs(User::query()->find($id));
        $this->get(UserResource::getUrl('create'))->assertStatus($statusCode);
    });

    it('Edit User Route Permissions', function (int $id, int $statusCode) {
        $this->actingAs(User::query()->find($id));
        $this->get(UserResource::getUrl('edit', [ STANDARD_USER_ID ]))->assertStatus($statusCode);
    });

    it('Index User Route Permissions', function (int $id, int $statusCode) {
        $this->actingAs(User::query()->find($id));
        $this->get(UserResource::getUrl())->assertStatus($statusCode);
    });
})->with([
    [ ADMIN_USER_ID, 200, ],
    [ STANDARD_USER_ID, 403, ],
]);
