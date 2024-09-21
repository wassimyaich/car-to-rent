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
    public $selectedCar = null; // Store the selected car

    /**
     * Define the form schema to include the car filter.
     */
    public function getFormSchema(): array
    {
        return [
            Forms\Components\Select::make('selectedCar')
                ->label('Filter by Car')
                ->options(Car::pluck('license_plate', 'id')->toArray())
                ->searchable()
                ->placeholder('Select a Car')
                ->reactive()
                ->afterStateUpdated(fn ($state) => $this->updateSelectedCar($state)),
        ];
    }

    /**
     * Update the selected car and refresh events.
     */
    protected function updateSelectedCar($state): void
    {
        $this->selectedCar = $state;
        $this->dispatch('refresh'); // Call to refresh events after updating the car
    }

    /**
     * Fetch events (reservations) from the database.
     */
    public function fetchEvents(array $info): array
    {
        $query = Reservation::query()
            ->with('car')
            ->where('start_date', '>=', $info['start'])
            ->where('end_date', '<=', $info['end']);

        // Apply car filter if selected
        if ($this->selectedCar) {
            $query->where('car_id', $this->selectedCar);
        }

        $reservations = $query->get();

        if ($reservations->isEmpty()) {
            Log::info('No reservations found for fetchevent.');
        } else {
            Log::info('Reservations found:', $reservations->toArray());
        }

        // Map reservations to calendar events
        return $reservations->map(function (Reservation $reservation) {
            return [
                'id' => $reservation->id,
                'title' => $reservation->car->license_plate . ' (' . $reservation->status . ')',
                'start' => $reservation->start_date,
                'end' => Carbon::parse($reservation->end_date)->addDay(),
                'color' => $this->getColorBasedOnStatus($reservation->status),
            ];
        })->all();
    }

    /**
     * Determine the color of the event based on the reservation status.
     */
    protected function getColorBasedOnStatus(string $status): string
    {
        return match ($status) {
            'reserved' => '#FFA500',
            'confirmed' => '#007BFF',
            'active' => '#28A745',
            'completed' => '#6C757D',
            'cancelled' => '#DC3545',
            default => '#6C757D',
        };
    }
}
