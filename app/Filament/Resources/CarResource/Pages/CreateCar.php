<?php

namespace App\Filament\Resources\CarResource\Pages;

use App\Models\Car;
use Filament\Actions;
use App\Filament\Resources\CarResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCar extends CreateRecord
{
    protected static string $resource = CarResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
       
     
   
        // Convert the uploaded file paths to JSON before saving
        if (isset($data['image_path']) && is_array($data['image_path'])) {
            $data['image_path'] = json_encode($data['image_path']);
        }

        return $data;

    }
    
}
