<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Type;
use App\Models\Brand;
use App\Models\State;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Log;

class CarFilter extends Component
{

    use WithPagination;
    
    #[Url]
    public $selected_brands=[];
    public $search_state = '';
    public $dropdownVisible = false; // To control dropdown visibility
    public $lastSelectedState = '';
    // New properties for price range
    public $minPrice = 1; // Default minimum price
    public $maxPrice = 1000; // Default maximum price
    
    public function render()
    {
        $cars = Car::paginate(9);
      
        // $maxDailyRate = Car::max('daily_rate'); // Get the maximum daily rate
        $maxDailyRate = Car::when($this->selected_brands, function ($query) {
            return $query->whereIn('brand_id', $this->selected_brands);
        })->max('daily_rate'); // Get the maximum daily rate
    
        $cars = Car::whereBetween('daily_rate', [$this->minPrice, $this->maxPrice])
                    ->when($this->selected_brands, function ($query) {
                        return $query->whereIn('brand_id', $this->selected_brands);
                    })
                    ->paginate(9);
    
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
    

        
        // $states = State::all();
        $brands = Brand::all();
        $types = Type::all();
        $categories = Category::all();
        

        return view('livewire.car-filter', compact("cars", "states", "brands", "types", "categories","maxDailyRate"));
    }
    public function hideDropdownDelayed()
    {
        // Add a small delay to allow for item selection before hiding
        $this->dispatch('hideDropdown');
    }
      public function showDropdown()
    {
        $this->dropdownVisible = true;
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

    public function updatePriceRange($minPrice, $maxPrice)
{
    $this->minPrice = $minPrice;
    $this->maxPrice = $maxPrice;
}

}




// public function mount()
// {
//     $this->on('updatePriceRange', 'updatePriceRange');
// }