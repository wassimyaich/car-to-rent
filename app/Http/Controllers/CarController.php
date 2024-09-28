<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use App\Models\State;
use App\Models\Type;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $cars = Car::all();
        $states = State::all();
        $brands = Brand::all();
        $types = Type::all();
        $categories = Category::all();
        return view("frontend.car", compact("cars", "states", "brands", "types", "categories"));

    }
}