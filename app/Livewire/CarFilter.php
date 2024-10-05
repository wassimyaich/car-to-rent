<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use App\Models\State;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class CarFilter extends Component
{
    use WithPagination;

    #[Url]
    public $selected_brands = [];

    #[Url]
    public $selected_types = [];

    // public $search_state = '';
    public $search_car = '';

    public $carsPerPage = 9; // Default number of cars per page

    // New properties for price range
    public $minPrice = 1; // Default minimum price

    public $maxPrice = 1000; // Default maximum price

    #[Url]
    public $pickUpDate;

    #[Url]
    public $dropOffDate;

    public $pickuptime;

    public $dropofftime;

    public $pickuplocation; // To store selected pickup state

    public $dropofflocation; // To store selected pickup state

    public $filteredStatesPickup = [];

    public $selectedCarName;

    public $selectedCarPrice;

    public $name; // Add this line

    public $phone; // Add this line

    public $email; // Add this line

    public function openRentModal($carId)
    {
        $car = Car::find($carId);
        $this->selectedCarName = $car->name;
        $pickUpDate = Carbon::parse($this->pickUpDate);
        $dropOffDate = Carbon::parse($this->dropOffDate);
        $numberOfDays = $pickUpDate->diffInDays($dropOffDate) + 1;

        $basePrice = ($car->daily_rate) * $numberOfDays;
        if ($numberOfDays > 14) {
            // More than 2 weeks: 8% discount
            $totalPrice = $basePrice * 0.92;
        } elseif ($numberOfDays > 7) {
            // More than 1 week: 5% discount
            $totalPrice = $basePrice * 0.95;
        } else {
            // Less than or equal to 1 week: no discount
            $totalPrice = $basePrice;
        }

        $this->selectedCarPrice = $totalPrice;

        // Open the Bootstrap modal
        $this->dispatch('show-rent-car-modal');
    }

    public function checkout()
    {
        // Validate input data
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15', // Adjust max length as necessary
            'pickUpDate' => 'required|date|after_or_equal:today', // Ensure pickup date is today or later
            'dropOffDate' => 'required|date|after:pickUpDate', // Ensure drop-off date is after pickup date
            'pickuplocation' => 'required|string|max:255',
            'dropofflocation' => 'required|string|max:255',
        ], [
            // Custom error messages
            'name.required' => 'Name is required.',
            'name.string' => 'Name must be a string.',
            'name.max' => 'Name may not be greater than 255 characters.',

            'email.required' => 'Email is required.',
            'email.email' => 'Email must be a valid email address.',
            'email.max' => 'Email may not be greater than 255 characters.',

            'phone.required' => 'Phone number is required.',
            'phone.string' => 'Phone number must be a string.',
            'phone.max' => 'Phone number may not be greater than 15 characters.',

            'pickUpDate.required' => 'Pickup date is required.',
            'pickUpDate.date' => 'Pickup date must be a valid date.',
            'pickUpDate.after_or_equal' => 'Pickup date must be today or later.',

            'dropOffDate.required' => 'Drop-off date is required.',
            'dropOffDate.date' => 'Drop-off date must be a valid date.',
            'dropOffDate.after' => 'Drop-off date must be after the pickup date.',

            'pickuplocation.required' => 'Pickup location is required.',
            'pickuplocation.string' => 'Pickup location must be a string.',
            'pickuplocation.max' => 'Pickup location may not be greater than 255 characters.',

            'dropofflocation.required' => 'Drop-off location is required.',
            'dropofflocation.string' => 'Drop-off location must be a string.',
            'dropofflocation.max' => 'Drop-off location may not be greater than 255 characters.',
        ]);

        // Calculate total price in cents
        $totalPrice = (int) $this->selectedCarPrice * 100;

        // Store data in session
        session([
            'totalPrice' => $totalPrice,
            'carname' => $this->selectedCarName,
            'pickupDate' => $this->pickUpDate,
            'dropoffDate' => $this->dropOffDate,
            'pickupLocation' => $this->pickuplocation,
            'dropoffLocation' => $this->dropofflocation,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);
        Log::info('session request', session()->all());
        // Set Stripe API key
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        // Retrieve values from session
        $carname = session('carname');
        $totalprice = session('totalPrice');

        // Check for valid payment details
        if (! $carname || ! $totalprice) {
            return redirect()->route('home')->with(['error' => 'Invalid payment details']);
        }

        // Create a Stripe Checkout session with metadata
        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'USD',
                        'product_data' => [
                            // Product name and description including rental details
                            'name' => $carname,
                            // Optional: Add description for clarity
                            // Uncomment if needed:
                            //  'description' => "Rental Details: Pickup at {$this->pickuplocation} on {$this->pickUpDate}, Drop-off at {$this->dropofflocation} on {$this->dropOffDate}",
                        ],
                        // Amount in cents
                        'unit_amount' => $totalprice,
                    ],
                    // Quantity of the product
                    'quantity' => 1,
                ],
            ],
            // Payment mode
            'mode' => 'payment',
            // URLs for success and cancellation
            'success_url' => route('success'),
            'cancel_url' => route('home'),

            // Adding metadata for tracking rental details
            // This can be useful for later reference or webhook handling
            'metadata' => [
                'pickup_location' => $this->pickuplocation,
                'pickup_date' => $this->pickUpDate,
                'dropoff_date' => $this->dropOffDate,
                'dropoff_location' => $this->dropofflocation,
            ],
        ]);

        // Redirect to the Stripe Checkout page
        return redirect()->away($session->url);
    }

    public function updatedPickupLocation()
    {
        $this->filteredStatesPickup = $this->getFilteredStates($this->pickuplocation);
    }

    private function getFilteredStates($query)
    {
        return State::where('name', 'like', '%'.$query.'%')
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

    public function updatedSelectedTypes()
    {
        $this->resetPage();
    }

    public function updatedCarsPerPage()
    {
        Log::info('pagination', ['carsPerPage' => $this->carsPerPage]); // Corrected log statement
        $this->resetPage();
    }

    public function updatedSearchCar()
    {
        Log::info('pickupdate', ['pickupdate' => $this->pickUpDate]);
        Log::info('dropOffDate', ['dropOffDate' => $this->dropOffDate]);
        $this->resetPage();
    }

    public function updatedPickUpDate()
    {
        Log::info('pickupdate', ['pickupdate' => $this->pickUpDate]);
        Log::info('dropOffDate', ['dropOffDate' => $this->dropOffDate]);
        $this->resetPage();
    }

    public function updatedDropOffDate()
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
                ->when($this->selected_types, function ($query) {
                    return $query->whereIn('type_id', $this->selected_types);
                })
                ->when($this->search_car, function ($query) {
                    return $query->where('name', 'like', '%'.$this->search_car.'%');
                })
                ->whereBetween('daily_rate', [$this->minPrice, $this->maxPrice])
                ->paginate($this->carsPerPage);
        } else {

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
                ->when($this->selected_types, function ($query) {
                    return $query->whereIn('type_id', $this->selected_types);
                })
                ->when($this->search_car, function ($query) {
                    return $query->where('name', 'like', '%'.$this->search_car.'%');
                })
                ->whereBetween('daily_rate', [$this->minPrice, $this->maxPrice])
                ->paginate($this->carsPerPage);
        }

        $pickuplocation = $this->pickuplocation;

        // $states = State::all();
        $brands = Brand::all();
        $types = Type::all();
        $categories = Category::all();

        return view('livewire.car-filter', compact('cars', 'brands', 'types', 'categories', 'maxDailyRate', 'pickuplocation'));
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
        Log::info('car slug'.$slug);

        return redirect()->route('cart.index', $slug);
    }
}
