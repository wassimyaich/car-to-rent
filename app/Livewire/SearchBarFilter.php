<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Type;
use App\Models\Brand;
use App\Models\State;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class SearchBarFilter extends Component
{
    public $search_state = '';
    public $dropdownVisible = false; // To control dropdown visibility
    public $lastSelectedState = '';
    public function render()
    {
        // Initialize empty states array
         // Initialize empty states array
    $states = [];
    Log::info('Rendering component with search state:', ['search_state' => $this->search_state]);

    // Show the dropdown if the search input has 1 or more characters
    if (strlen($this->search_state) >= 1 && $this->search_state !== $this->lastSelectedState) {
       
        // Query the states based on the search input
        $states = State::where('name', 'like', '%' . $this->search_state . '%')->limit(5)->get();
        // Set dropdown visibility based on whether any states are found
        $this->dropdownVisible = count($states) > 0;
    } else {
        // Hide dropdown if search input is empty
        $this->dropdownVisible = false;
    }

    Log::info('Dropdown visibility in render:', ['dropdownVisible' => $this->dropdownVisible]);

    // Fetch other necessary data for the view
    $cars = Car::all();
    $brands = Brand::all();
    $types = Type::all();
    $categories = Category::all();

    // Pass data to the view
    return view('livewire.search-bar-filter', compact("cars", "states", "brands", "types", "categories"));

    }

    public function selectState($stateName)
    {
        Log::info('State selected:', ['stateName' => $stateName]);
        // Set the selected state name in the search input
        $this->search_state = $stateName;
        // Hide the dropdown after selecting the state
        $this->dropdownVisible = false;
        $this->lastSelectedState = $stateName;
        Log::info('Dropdown visibility after selected:', ['dropdownVisible' => $this->dropdownVisible]);

    }
}