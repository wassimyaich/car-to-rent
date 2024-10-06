<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    public function approve(Request $request, Reservation $reservation)
    {
        try {
            $reservation->update(['status' => 'reserved']);
            Log::info("Reservation {$reservation->id} approved successfully.");

            return response()->json(['message' => 'Reservation approved successfully.'], 200);
        } catch (\Exception $e) {
            Log::error("Error approving reservation {$reservation->id}: ".$e->getMessage());

            return response()->json(['message' => 'Failed to approve reservation.'], 500);
        }
    }
}
