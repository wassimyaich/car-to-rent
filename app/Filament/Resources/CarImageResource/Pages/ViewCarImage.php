<?php

namespace App\Filament\Resources\CarImageResource\Pages;

use App\Filament\Resources\CarImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCarImage extends ViewRecord
{
    protected static string $resource = CarImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
