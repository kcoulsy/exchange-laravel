<?php

namespace App\Providers;

use App\Filament\Resources\UserResource;
use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            if (auth()->user() && auth()->user()->hasAnyRole(['super-admin', 'admin'])) {
                Filament::registerUserMenuItems([
                    UserMenuItem::make()->label('Manage Users')->url(UserResource::getUrl())->icon('heroicon-s-users')
                ]);
            }
        });
    }
}