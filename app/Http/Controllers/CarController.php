<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Type;
use App\Models\Brand;
use App\Models\State;
use App\Models\Category;
use Carbon\Carbon;
use DateTime;
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

        // $pickUpDate = $request->pickupDate;
        // Log::info('pickUpLocation is', ['data' => $pickUpDate]);

        // $dropOffDate = $request->dropoffDate;
        // Log::info('pickUpLocation is', ['data' => $dropOffDate]);
        // Get pickup date from request
        $pickUpDate = $request->pickupDate;

        // Check if pickup date is null and set a default value
        // if (is_null($pickUpDate)) {
        //     $pickUpDate = (new DateTime())->format('m/d/Y'); // Default to today's date
        // } else {
        //     // Format the pickup date
        //     $pickUpDate = (new DateTime($pickUpDate))->format('m/d/Y');
        // }

        // Log formatted pickup date
        Log::info('pickUpLocation is', ['data' => $pickUpDate]);

        // Get drop-off date from request
        $dropOffDate = $request->dropoffDate;

        // Check if drop-off date is null and set a default value (today + 90 days)
        // if (is_null($dropOffDate)) {
        //     $dropOffDate = (new DateTime())->modify('+90 days')->format('m/d/Y'); // Default to today's date + 90 days
        // } else {
        //     // Format the drop-off date
        //     $dropOffDate = (new DateTime($dropOffDate))->format('m/d/Y');
        // }

        // Log formatted drop-off date
        Log::info('dropOffLocation is', ['data' => $dropOffDate]);





        $pickuptime = $request->pickuptime;
        Log::info('pickUpLocation is', ['data' => $pickuptime]);
        $dropofftime = $request->dropofftime;



        $cars = Car::all();
        $states = State::all();
        $brands = Brand::all();
        $types = Type::all();
        $categories = Category::all();
        return view("frontend.car", compact("cars", "states", "brands", "types", "categories", 'pickUpLocation', 'dropOffLocation', 'pickUpDate', 'dropOffDate', 'pickuptime', 'dropofftime'));
    }
}
