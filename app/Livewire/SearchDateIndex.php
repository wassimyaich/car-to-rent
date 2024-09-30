<?php

namespace App\Livewire;

use App\Models\State;
use Livewire\Component;
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

    public function updatedPickupLocation($value)
    {
        // Search for states based on the pickup location input
        $this->filteredStatesPickup = State::where('name', 'like', '%' . $value . '%')->get();
    }

    public function updatedDropoffLocation($value)
    {
        // Search for states based on the drop-off location input
        $this->filteredStatesDropoff = State::where('name', 'like', '%' . $value . '%')->get();
    }

    public function selectPickupState($stateName)
    {
        $this->pickupLocation = $stateName;
        $this->filteredStatesPickup = []; // Clear the dropdown after selection
    }

    public function selectDropoffState($stateName)
    {
        $this->dropoffLocation = $stateName;
        $this->filteredStatesDropoff = []; // Clear the dropdown after selection
    }

   

    public function rentCarNow()
    {
        // Validation logic here (if needed)
        
        // Redirect with all data
        return redirect()->route('car.index', [
            'pickUpLocation' => $this->pickUpLocation,
            'dropOffLocation' => $this->dropOffLocation,
            'pickUpDate' => $this->pickUpDate,
            'dropOffDate' => $this->dropOffDate,
            'pickUpTime' => $this->pickUpTime,
            'state' => $this->state,
        ]);
    }
}