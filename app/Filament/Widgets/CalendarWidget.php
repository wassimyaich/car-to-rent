<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Filament\Forms;

use App\Models\Car;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Reservation;
use Illuminate\Support\Facades\Log;
use App\Filament\Resources\ReservationResource;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{

    // public function fetchEvents(array $fetchInfo): array
    // {
    //     $reservations = Reservation::with('car')->get();
    //     if ($reservations->isEmpty()) {
    //         Log::info('No reservations found');
    //     } else {
    //         Log::info('Reservations found:', $reservations->toArray());
    //     }
    //     return Reservation::query()
    //         ->where('start_date', '>=', $fetchInfo['start'])
    //         ->where('end_date', '<=', $fetchInfo['end'])
    //         ->get()
    //         ->map(
    //             fn (Reservation $event) => [
    //                 'title' => $event->id,
    //                 'start' => $event->start_date,
    //                 'end' => $event->end_date,
    //                 'url' => ReservationResource::getUrl(name: 'view', parameters: ['record' => $event]),
    //                 'shouldOpenUrlInNewTab' => true
    //             ]
    //         )
    //         ->all();
    // }
public $selectedCar = null;
public function getFormSchema(): array
{
    // Add the car selection dropdown form above the calendar
    return [
        Forms\Components\Select::make('selectedCar')
        ->label('Filter by Car')
        ->options(Car::pluck('license_plate', 'id')) // Show car license plate in the dropdown
        ->searchable() // Allows searching cars
        ->placeholder('Select a Car to Filter')
        ->reactive() // React to state changes
        ->afterStateUpdated( fn ($state, callable $set) => $set('selectedCar', $state)) // Trigger function on car selection
];
}
    // public function fetchEvents(array $fetchInfo): array
    // {
    //     // Fetch reservations with related car details
    //     $reservations = Reservation::with('car')
    //         ->where('start_date', '>=', $fetchInfo['start'])
    //         ->where('end_date', '<=', $fetchInfo['end'])
    //         ->get();

    //     if ($reservations->isEmpty()) {
    //         Log::info('No reservations found');
    //     } else {
    //         Log::info('Reservations found:', $reservations->toArray());
    //     }

    //     // Map each reservation to a calendar event
    //     return $reservations->map(function (Reservation $reservation) {
    //         return [
    //             'id' => $reservation->id,
    //             'title' => $reservation->car->brand->name . ' (' . $reservation->status . ')', // Car brand and status
    //             'start' => $reservation->start_date,
    //             'end' => Carbon::parse($reservation->end_date)->addDay(), // Include the end date
    //             'url' => ReservationResource::getUrl(name: 'view', parameters: ['record' => $reservation]), // Link to reservation
    //             'shouldOpenUrlInNewTab' => true,
    //             'color' => $this->getColorBasedOnStatus($reservation->status), // Set color based on reservation status
    //         ];
    //     })->all();
    // }
    public function fetchEvents(array $fetchInfo): array
    {
        // Query reservations between the calendar start and end dates
        $query = Reservation::query()
            ->with('car')
            ->where('start_date', '>=', $fetchInfo['start'])
            ->where('end_date', '<=', $fetchInfo['end']);

        // Filter by selected car if any
        if ($this->selectedCar) {
            $query->where('car_id', $this->selectedCar);
        }

        $reservations = $query->get();

        if ($reservations->isEmpty()) {
            Log::info('No reservations found');
        } else {
            Log::info('Reservations found:', $reservations->toArray());
        }

        // Map each reservation to a calendar event
        return $reservations->map(function (Reservation $reservation) {
            return [
                'id' => $reservation->id,
                'title' => $reservation->car->brand->name . ' (' . $reservation->status . ')',
                'start' => $reservation->start_date,
                'end' => Carbon::parse($reservation->end_date)->addDay(), // Add a day to include end date
                'color' => $this->getColorBasedOnStatus($reservation->status),
            ];
        })->all();
    }
    // Determine event color based on reservation status
    protected function getColorBasedOnStatus($status): string
    {
        switch ($status) {
            case 'reserved':
                return '#FFA500'; // Orange for reserved
            case 'confirmed':
                return '#007BFF'; // Blue for confirmed
            case 'active':
                return '#28A745'; // Green for active
            case 'completed':
                return '#6C757D'; // Gray for completed
            case 'cancelled':
                return '#DC3545'; // Red for cancelled
            default:
                return '#6C757D'; // Gray for other statuses
        }
    }
}
