<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Type;
use App\Models\Brand;
use App\Models\State;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $pickUpLocation = $request->pickupLocation;

        Log::info('pickUpLocation is', ['data' => $pickUpLocation]);
        $dropOffLocation = $request->dropoffLocation;
        Log::info('pickUpLocation is', ['data' => $dropOffLocation]);

        $pickUpDate = $request->pickupDate;
        Log::info('pickUpLocation is', ['data' => $pickUpDate]);

        $dropOffDate = $request->dropoffDate;
        Log::info('pickUpLocation is', ['data' => $dropOffDate]);

        $pickuptime = $request->pickuptime;
        Log::info('pickUpLocation is', ['data' => $pickuptime]);
        $dropofftime = $request->dropofftime;



        $cars = Car::all();
        $states = State::all();
        $brands = Brand::all();
        $types = Type::all();
        $categories = Category::all();
        return view("frontend.car", compact("cars", "states", "brands", "types", "categories",'pickUpLocation', 'dropOffLocation', 'pickUpDate', 'dropOffDate', 'pickuptime','dropofftime'));

    }
}
