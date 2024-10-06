<?php

namespace App\Filament\Pages;

use App\Models\Reservation;
use Carbon\Carbon;
use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard';

    public $totalRevenue;

    public $monthlyRevenue;

    public $todayRevenue;

    public $latestReservation;

    public function mount()
    {
        $this->calculateMetrics();
    }

    protected function calculateMetrics()
    {
        $this->totalRevenue = Reservation::sum('total_cost');

        $this->monthlyRevenue = Reservation::whereMonth('created_at', Carbon::now()->month)
            ->sum('total_cost');

        $this->todayRevenue = Reservation::whereDate('created_at', Carbon::today())
            ->sum('total_cost');

        $this->latestReservation = Reservation::latest()->first();
    }
}
