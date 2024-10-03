<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class SearchStateController extends Controller
{

    public function getSuggestions(Request $request)
    {
        $query = $request->input('query');
    $type = $request->input('type');

    // Fetch locations based on the query and type (pickup/dropoff)
    $locations = State::where('name', 'like', "%$query%")->take(10)->get(); // Adjust as necessary

    return response()->json($locations);


    }
}
