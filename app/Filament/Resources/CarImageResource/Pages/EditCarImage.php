<?php

namespace App\Filament\Resources\CarImageResource\Pages;

use App\Filament\Resources\CarImageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarImage extends EditRecord
{
    protected static string $resource = CarImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
