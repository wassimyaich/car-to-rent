<?php

// namespace App\Filament\Pages;

// use App\Models\Car;
// use Filament\Pages\Page;
// use App\Models\Reservation;

// class CarCalendar extends Page
// {
//     protected static ?string $navigationIcon = 'heroicon-o-document-text';

//     protected static string $view = 'filament.pages.car-calendar';

//     protected static ?string $slug = 'CarCalendar';

//     public $carStatuses;
//      public $cars;

//     public function mount()
//     {
//         $this->carStatuses = Reservation::with('car')->get()->map(function ($status) {
//             return [
//                 'title' => $status->car->license_plate . ' (' . $status->status . ')',
//                 'start' => $status->start_date->toIso8601String(),
//                 'end' => $status->end_date ? $status->end_date->toIso8601String() : $status->start_date->toIso8601String(),
//                 'color' => $this->getColorByStatus($status->status),
//                 'car' => $status->car, // Add car information for filtering
//             ];
//         })->toArray();

//         // Fetch all cars
//         $this->cars = Car::all(); // This is equivalent to {{ \App\Models\Car::all()->all }}
//     }

//     private function getColorByStatus(string $status): string
//     {
//         return match ($status) {
//             'active' => 'green',
//             'reserved' => 'blue',
//             'canceled' => 'red',
//             'confirmed' => 'yellow',
//             default => 'gray',
//         };
//     }
// }


namespace App\Filament\Pages;

use App\Models\Car;
use Filament\Pages\Page;
use App\Models\Reservation;

class CarCalendar extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.car-calendar';

    protected static ?string $slug = 'CarCalendar';

    public $carStatuses;
    public $cars;

    public function mount()
    {
        $this->carStatuses = Reservation::with('car')->get()->map(function ($status) {
            return [
                'title' => $status->car->license_plate . ' (' . $status->status . ')',
                'start' => $status->start_date->toIso8601String(),
                'end' => $status->end_date ? $status->end_date->toIso8601String() : $status->start_date->toIso8601String(),
                'color' => $this->getColorByStatus($status->status),
                'car' => $status->car, // Add car information for filtering
            ];
        })->toArray();

        // Fetch all cars
        $this->cars = Car::all();
    }

    private function getColorByStatus(string $status): string
    {
        return match ($status) {
            'active' => 'green',
            'reserved' => 'blue',
            'canceled' => 'red',
            'confirmed' => 'yellow',
            default => 'gray',
        };
    }
}