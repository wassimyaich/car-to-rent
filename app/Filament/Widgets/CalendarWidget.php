<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Car;

use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Reservation;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;
use App\Filament\Resources\ReservationResource;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{
    public $selectedCar = null;

    public function getCars(): \Illuminate\Support\Collection
    {
        return Car::all();
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        $plugin = \Saade\FilamentFullCalendar\FilamentFullCalendarPlugin::get();

        return view('vendor.filament-fullcalendar.fullcalendar', [
            'cars' => $this->getCars(),
            'plugin' => $plugin,
        ]);
    }

    public function mount(): void
    {
        $this->selectedCar = null;
    }

    public function updateCarSelection($carId)
    {
        $this->selectedCar = $carId ?: null;

        // Call refreshEvents only if it exists
        if (method_exists($this, 'refreshEvents')) {
            $this->refreshEvents();
        }
    }

    public function fetchEvents(array $info): array
    {
        Log::info('Fetching events with info:', $info);

        $query = Reservation::query()
            ->with('car')
            ->where('start_date', '>=', $info['start'])
            ->where('end_date', '<=', $info['end']);

        if ($this->selectedCar) {
            $query->where('car_id', $this->selectedCar);
        }

        $reservations = $query->get();

        if ($reservations->isEmpty()) {
            Log::info('No reservations found for fetchEvents.');
        } else {
            Log::info('Reservations found:', $reservations->toArray());
        }

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

    // Placeholder for the refreshEvents method
    public function refreshEvents()
    {
        
        Log::info('Refreshing events...');
        // $this->dispatch('refresh-calendar');
        $currentRange = [
            'start' => now()->startOfMonth()->toDateString(), // Adjust this as needed
            'end' => now()->endOfMonth()->toDateString(), // Adjust this as needed
        ];
    
        // Fetch events for the current date range
        $events = $this->fetchEvents($currentRange);
        $this->dispatch('refresh-calendar');

        return $events;

       
    }

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
    public function fetchEventsForCalendar(): array
{
    $query = Reservation::query()->with('car');

    if ($this->selectedCar) {
        $query->where('car_id', $this->selectedCar);
    }

    $reservations = $query->get();

    return $reservations->map(function (Reservation $reservation) {
        return [
            'id' => $reservation->id,
            'title' => $reservation->car->license_plate . ' (' . $reservation->status . ')',
            'start' => $reservation->start_date->toIso8601String(),
            'end' => $reservation->end_date ? $reservation->end_date->toIso8601String() : $reservation->start_date->toIso8601String(),
            'color' => $this->getColorBasedOnStatus($reservation->status),
        ];
    })->toArray();
}
   
}
