<?php

namespace App\Filament\Resources\ReservationResource\Pages;

use Filament\Actions;
use App\Models\Reservation;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Validator;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;
use App\Filament\Resources\ReservationResource;

class CreateReservation extends CreateRecord
{
    protected static string $resource = ReservationResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        Log::info('Attempting to create Reservation', ['data' => $data]);

        // Check if the car is already reserved for the selected dates
        $isCarReserved = Reservation::where('car_id', $data['car_id'])
            ->where(function ($query) use ($data) {
                // Check for overlapping dates: new reservation starts or ends during an existing one, or it fully contains an existing one
                $query->where(function ($query) use ($data) {
                    $query->where('start_date', '<=', $data['end_date'])
                        ->where('end_date', '>=', $data['start_date']);
                });
            })
            ->whereIn('status', ['reserved', 'active']) // Check only if it's not cancelled or completed
            ->exists();
            Log::info('isCarReserved', ['isCarReserved' => $isCarReserved]);

        if ($isCarReserved) {
            Notification::make()
            ->title('Reservation Submission Error')
            ->body(' Please change the dates or cancel the existing reservation before creating a new one.')
            ->danger()
            ->send();
            // throw ValidationException::withMessages([
            //     'car_id' => 'The selected car is already reserved for the chosen dates. Please choose different dates or cancel the existing reservation before creating a new one for this car.'
            // ]);
            Log::info('Car is already reserved for the selected dates', ['car_id' => $data['car_id']]);
            // $this->notify('danger', 'The selected car is already reserved for the chosen dates.');
            
            $this->halt(); // Prevent saving the record

            
        }
        $validator = Validator::make($data, [
            'start_date' => ['required', 'date', 'after_or_equal:today'],
            'end_date' => ['required', 'date', 'after:start_date'],
        ]);

        if ($validator->fails()) {
            Notification::make()
            ->title('Reservation Date Submission Error')
            ->body(' Please change the dates.')
            ->danger()
            ->send();
            // throw ValidationException::withMessages($validator->errors()->toArray());
            $this->halt(); // Prevent saving the record

        }

        // Log successful validation
        Log::info('Validation passed for Reservation creation', ['car_id' => $data['car_id']]);

        // Proceed with creating the record
        return static::getModel()::create($data);
    }


    protected function afterSave(): void
    {
        // Add any custom logic after the reservation is created
        // For example, send a notification to the user or log the reservation
        Log::info('Reservation created: ' . $this->record->id);
    }
}
