<?php

namespace App\Filament\Resources\CarImageResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\CarImage;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;
use App\Filament\Resources\CarImageResource;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log; // Import the Log facade
class CreateCarImage extends CreateRecord
{
    protected static string $resource = CarImageResource::class;


    protected function handleRecordCreation(array $data): Model
    {
        // Log the incoming data
        Log::info('Attempting to create CarImage', ['data' => $data]);

        // Check if there are existing images for the same car_id
        $carId = $data['car_id']; // Assuming 'car_id' is in the form data
        $existingImages = CarImage::where('car_id', $carId)->count();

        if ($existingImages >= 4) {
            Notification::make()
                ->title('Image Submission Error')
                ->body('A maximum of 4 images is allowed per car. Please remove existing images before adding new ones.')
                ->danger()
                ->send();

            // Log the error
            Log::warning('Image submission error: existing images found for car_id', ['car_id' => $carId]);

            throw ValidationException::withMessages([
                'car_id' => 'A maximum of 4 images is allowed for this car. Please remove some images before adding new ones.'
            ]);


        }

        // Log successful validation
        Log::info('Validation passed for CarImage creation', ['car_id' => $carId]);

        // Proceed with creating the record
        return static::getModel()::create($data);
    }
}
