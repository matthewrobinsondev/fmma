<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Modules\Fighters\Interfaces\FighterServiceInterface;
use Modules\Fighters\Services\FighterService;
use Modules\Teams\Interfaces\TeamServiceInterface;
use Modules\Teams\Services\TeamService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TeamServiceInterface::class, TeamService::class);
        $this->app->bind(FighterServiceInterface::class, FighterService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::shouldBeStrict(app()->isLocal());
    }
}
