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
    public $selected_brands = [];
    // public $search_state = '';
    public $search_car = '';
    public $carsPerPage = 9; // Default number of cars per page
    // New properties for price range
    public $minPrice = 1; // Default minimum price
    public $maxPrice = 1000; // Default maximum price

    public $pickUpDate;
    public $dropOffDate;
    public $pickuptime;
    public $dropofftime;
    public $pickuplocation; // To store selected pickup state
    public $dropofflocation; // To store selected pickup state
    public $filteredStatesPickup = [];


    public $selectedCarName;
    public $selectedCarPrice;

    public function openRentModal($carId)
    {
        $car = Car::find($carId);
        $this->selectedCarName = $car->name;
        $this->selectedCarPrice = $car->daily_rate;

        // Open the Bootstrap modal
        $this->dispatch('show-rent-car-modal');
    }

    public function checkout()
    {
        // Handle checkout logic here
        // For example, save reservation and redirect to payment page
    }



    public function updatedPickupLocation()
    {
        $this->filteredStatesPickup = $this->getFilteredStates($this->pickuplocation);
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
        $this->pickuplocation = $stateName;
        $this->filteredStatesPickup = [];
    }

    public function mount($pickUpDate = null, $dropOffDate = null, $pickuptime = null, $dropofftime = null, $pickuplocation = null, $dropofflocation = null)
    {
        $this->pickUpDate = $pickUpDate;
        $this->dropOffDate = $dropOffDate;
        $this->pickuptime = $pickuptime;
        $this->dropofftime = $dropofftime;
        $this->pickuplocation = $pickuplocation;
        $this->dropofflocation = $dropofflocation;
    }
    public function updatedSelectedBrands()
    {
        // Reset pagination to page 1 when the selected brands change
        $this->resetPage();
    }

    public function updatedCarsPerPage()
    {
        Log::info('pagination', ['carsPerPage' => $this->carsPerPage]); // Corrected log statement
        $this->resetPage();
    }

    public function updatedSearchCar()
    {
        $this->resetPage();
    }

    public function render()
    {

        // $maxDailyRate = Car::max('daily_rate'); // Get the maximum daily rate
        $maxDailyRate = Car::when($this->selected_brands, function ($query) {
            return $query->whereIn('brand_id', $this->selected_brands);
        })->max('daily_rate'); // Get the maximum daily rate



        // end query

        if ($this->pickUpDate && $this->dropOffDate && $this->pickuplocation) {
            $cars = Car::where('is_available', true)
                ->when($this->pickuplocation, function ($query) {
                    $query->whereHas('state', function ($query) {
                        $query->where('name', $this->pickuplocation); // Match the state name
                    });
                })
                ->whereDoesntHave('reservations', function ($query) {
                    $query->where('status', 'reserved')
                        ->orWhere('status', 'active')
                        ->where(function ($q) {
                            $q->whereBetween('start_date', [$this->pickUpDate, $this->dropOffDate])
                                ->orWhereBetween('end_date', [$this->pickUpDate, $this->dropOffDate])
                                ->orWhere(function ($q2) {
                                    $q2->where('start_date', '<=', $this->pickUpDate)
                                        ->where('end_date', '>=', $this->dropOffDate);
                                });
                        });
                })
                ->when($this->selected_brands, function ($query) {
                    return $query->whereIn('brand_id', $this->selected_brands);
                })
                ->when($this->search_car, function ($query) {
                    return $query->where('name', 'like', '%' . $this->search_car . '%');
                })
                ->whereBetween('daily_rate', [$this->minPrice, $this->maxPrice])
                ->paginate($this->carsPerPage);
        } else {
            // $cars = Car::whereBetween('daily_rate', [$this->minPrice, $this->maxPrice])
            //     ->when($this->selected_brands, function ($query) {
            //         return $query->whereIn('brand_id', $this->selected_brands);
            //     })
            //     ->when($this->search_car, function ($query) {
            //         return $query->where('name', 'like', '%' . $this->search_car . '%');
            //     })
            //     ->paginate($this->carsPerPage);
            $cars = Car::where('is_available', true)
                ->when($this->pickuplocation, function ($query) {
                    $query->whereHas('state', function ($query) {
                        $query->where('name', $this->pickuplocation); // Match the state name
                    });
                })
                ->whereDoesntHave('reservations', function ($query) {
                    // Apply the date conditions first, but only if both pickUpDate and dropOffDate are not null
                    if ($this->pickUpDate && $this->dropOffDate) {
                        $query->where(function ($q) {
                            $q->whereBetween('start_date', [$this->pickUpDate, $this->dropOffDate])
                                ->orWhereBetween('end_date', [$this->pickUpDate, $this->dropOffDate])
                                ->orWhere(function ($q2) {
                                    $q2->where('start_date', '<=', $this->pickUpDate)
                                        ->where('end_date', '>=', $this->dropOffDate);
                                });
                        });
                    }

                    // Then apply the reservation status check
                    $query->where(function ($q) {
                        $q->where('status', 'reserved')
                            ->orWhere('status', 'active');
                    });
                })
                ->when($this->selected_brands, function ($query) {
                    return $query->whereIn('brand_id', $this->selected_brands);
                })
                ->when($this->search_car, function ($query) {
                    return $query->where('name', 'like', '%' . $this->search_car . '%');
                })
                ->whereBetween('daily_rate', [$this->minPrice, $this->maxPrice])
                ->paginate($this->carsPerPage);
        }




        // if ($this->pickUpDate && $this->dropOffDate) {
        //     $q->whereBetween('start_date', [$this->pickUpDate, $this->dropOffDate])
        //         ->orWhereBetween('end_date', [$this->pickUpDate, $this->dropOffDate])
        //         ->orWhere(function ($q2) {
        //             $q2->where('start_date', '<=', $this->pickUpDate)
        //                 ->where('end_date', '>=', $this->dropOffDate);
        //         });
        // }


        $pickuplocation = $this->pickuplocation;

        // $states = State::all();
        $brands = Brand::all();
        $types = Type::all();
        $categories = Category::all();


        return view('livewire.car-filter', compact("cars", "brands", "types", "categories", "maxDailyRate","pickuplocation"));
    }



    public function updatePriceRange($minPrice, $maxPrice)
    {
        $this->minPrice = $minPrice;
        $this->maxPrice = $maxPrice;
    }
    public function getMaxDailyRateProperty()
    {
        return Car::when($this->selected_brands, function ($query) {
            return $query->whereIn('brand_id', $this->selected_brands);
        })->max('daily_rate');
    }
    public function RentCar($id)
    {
        $slug = Car::findorfail($id)->slug;
        Log::info('car slug' . $slug);
        return redirect()->route('cart.index',  $slug);
    }
}
