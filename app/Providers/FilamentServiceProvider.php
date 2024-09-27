<?php

namespace App\Providers;

use Filament\Facades\Filament;

use App\Filament\Pages\SettingsPage;
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
            Filament::registerPages([
                SettingsPage::class,
            ]);
        });
    }
}
