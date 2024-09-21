<?php

namespace App\Filament\Resources\CarImageResource\Pages;

use App\Filament\Resources\CarImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarImages extends ListRecords
{
    protected static string $resource = CarImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
