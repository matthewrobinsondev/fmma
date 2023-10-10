<?php

use App\Filament\Resources\UserResource;
use App\Models\User;
use Database\Seeders\RolesAndPermissions;

beforeEach(function () {
    $this->seed(RolesAndPermissions::class);
});

it('Create User', function () {
    $this->actingAs(User::query()->find(1));
    $this->get(UserResource::getUrl('create'))->assertSuccessful();
});
