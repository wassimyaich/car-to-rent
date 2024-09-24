<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSetting extends CreateRecord
{
    // protected static string $resource = SettingResource::class;
    public static function canCreate(): bool
{
    return false; // This will prevent the create button from showing up
}
}
