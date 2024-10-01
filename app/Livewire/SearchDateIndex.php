<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\State;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class SearchDateIndex extends Component
{
    public $pickupLocation = '';
    public $dropoffLocation = '';
    public $pickupDate;
    public $dropoffDate;
    public $pickupTime;
    public $filteredStatesPickup = [];
    public $filteredStatesDropoff = [];

    public function render()
    {
        return view('livewire.search-date-index');
    }

    public function updatedPickupLocation()
    {
        $this->filteredStatesPickup = $this->getFilteredStates($this->pickupLocation);
    }

    public function updatedDropoffLocation()
    {
        $this->filteredStatesDropoff = $this->getFilteredStates($this->dropoffLocation);
    }

    private function getFilteredStates($query)
    {
        return State::where('name', 'like', '%' . $query . '%')
            ->limit(5)
            ->get()
            ->map(function ($state) {
                return ['id' => $state->id, 'name' => $state->name];
            });
    }

    public function selectPickupState($stateName)
    {
        $this->pickupLocation = $stateName;
        $this->filteredStatesPickup = [];
    }

    public function selectDropoffState($stateName)
    {
        $this->dropoffLocation = $stateName;
        $this->filteredStatesDropoff = [];
    }

    public function rentCarNow()
    {
    

    try {

        $pickupDate = Carbon::createFromFormat('m/d/Y', $this->pickupDate);
        $dropoffDate = Carbon::createFromFormat('m/d/Y', $this->dropoffDate);

        $this->validate([
            'pickupDate' => 'required|date|after_or_equal:today|before:dropoffDate',
            'dropoffDate' => 'required|date|after:pickupDate',
            // 'pickupTime' => 'required|date_format:H:i|after_or_equal:08:00|before_or_equal:18:00',
            // 'dropoffTime' => 'required|date_format:H:i|after_or_equal:08:00|before_or_equal:18:00',
            'pickupLocation' => 'required|string|different:dropoffLocation',
            'dropoffLocation' => 'required|string|different:pickupLocation',
        ], [
            'pickupDate.before' => 'The pick-up date must be before the drop-off date.',
            'pickupDate.after_or_equal' => 'The pick-up date cannot be in the past.',
            'pickupLocation.different' => 'The pick-up and drop-off locations must be different.',
            // 'pickupTime.after_or_equal' => 'The pick-up time must be within business hours (8:00 AM - 6:00 PM).',
            // 'dropoffTime.before_or_equal' => 'The drop-off time must be within business hours (8:00 AM - 6:00 PM).',
            'pickupLocation.in' => 'Invalid pick-up location.',
            'dropoffLocation.in' => 'Invalid drop-off location.',
        ]);

        // Additional logic for car availability, rental duration, etc.
        // $days = Carbon::parse($this->dropoffDate)->diffInDays(Carbon::parse($this->pickupDate));
        $days = $pickupDate->diffInDays($dropoffDate);
    Log::info('days:', ['days' => $days]);

        if ($days < 1) {
            return redirect()->back()->with(['error'=>'The rental must be at least 1 day long.']);
        }
        if ($days > 30) {
            return redirect()->back()->with(['error'=>'The rental cannot be longer than 30 days.']);
        }

        // if (!Car::isAvailable($this->pickupDate, $this->dropoffDate, $this->pickupLocation)) {
        //     return redirect()->back()->withErrors('No cars available for the selected dates and location.');
        // }


            // Validate or log necessary data here
    Log::info('Pick-up Location:', ['data' => $this->pickupLocation]);
    Log::info('Drop-off Location:', ['data' => $this->dropoffLocation]);
    Log::info('Pick-up Date:', ['data' => $this->pickupDate]);
    Log::info('Drop-off Date:', ['data' => $this->dropoffDate]);
    Log::info('Pick-up Time:', ['data' => $this->pickupTime]);

    return redirect()->route('car.index', [
        'pickupDate' => $this->pickupDate,
        'dropoffDate' => $this->dropoffDate,
        'pickupTime' => $this->pickupTime,
        'pickupLocation' => $this->pickupLocation,
        'dropoffLocation' => $this->dropoffLocation,
        
    ]);



    } catch (\Exception $e) {
        return redirect()->back()->with(['error'=>'a problem exist : '.$e ->getMessage()])->withInput();
    }

        
      
    }
}