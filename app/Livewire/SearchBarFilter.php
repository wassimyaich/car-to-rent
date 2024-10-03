<?php

// namespace App\Livewire;

// use App\Models\Car;
// use App\Models\Type;
// use App\Models\Brand;
// use App\Models\State;
// use Livewire\Component;
// use App\Models\Category;
// use Illuminate\Support\Facades\Log;

// class SearchBarFilter extends Component
// {
//     public $search_state = '';
//     public $dropdownVisible = false; // To control dropdown visibility
//     public $lastSelectedState = '';
//     public function render()
//     {

//     $states = [];
//     Log::info('Rendering component with search state:', ['search_state' => $this->search_state]);


//     if (strlen($this->search_state) >= 1 && $this->search_state !== $this->lastSelectedState) {

//         $states = State::where('name', 'like', '%' . $this->search_state . '%')->limit(5)->get();

//         $this->dropdownVisible = count($states) > 0;
//     } else {

//         $this->dropdownVisible = false;
//     }

//     Log::info('Dropdown visibility in render:', ['dropdownVisible' => $this->dropdownVisible]);


//     $cars = Car::all();
//     $brands = Brand::all();
//     $types = Type::all();
//     $categories = Category::all();


//     return view('livewire.search-bar-filter', compact("cars", "states", "brands", "types", "categories"));

//     }

//     public function selectState($stateName)
//     {
//         Log::info('State selected:', ['stateName' => $stateName]);

//         $this->search_state = $stateName;

//         $this->dropdownVisible = false;
//         $this->lastSelectedState = $stateName;
//         Log::info('Dropdown visibility after selected:', ['dropdownVisible' => $this->dropdownVisible]);

//     }
//     public function hideDropdownDelayed()
//     {

//         $this->dispatch('hideDropdown');
//     }
//       public function showDropdown()
//     {
//         $this->dropdownVisible = true;
//     }
// }
