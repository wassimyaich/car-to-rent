<?php

namespace Database\Seeders;

use App\Models\Reservation;
use App\Models\User;
use App\Models\Car;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ReservationSeeder extends Seeder
{
    public function run()
    {
        // Define how many reservations you want to create
        $numberOfReservations = 50;

        // Loop to create multiple reservation entries
        for ($i = 0; $i < $numberOfReservations; $i++) {
            // Generate random start and end dates
            $startDate = Carbon::now()->addDays(rand(1, 30)); // Random start date within the next 30 days
            $endDate = (clone $startDate)->addDays(rand(1, 14)); // Random end date within 1 to 14 days after start date

            Reservation::create([
                'user_id' => User::inRandomOrder()->first()->id, // Random user ID
                'phone' => '555-' . rand(1000, 9999), // Random phone number
                'car_id' => Car::inRandomOrder()->first()->id, // Random car ID
                'pickup_location' => 'Location ' . rand(1, 10), // Random pickup location
                'dropoff_location' => 'Location ' . rand(11, 20), // Random dropoff location
                'start_date' => $startDate,
                'end_date' => $endDate,
                'total_cost' => round(rand(50, 500) * ($endDate->diffInDays($startDate)), 2), // Calculate total cost based on daily rate and duration
                'status' => ['pending', 'reserved', 'active', 'completed', 'cancelled'][rand(0, 4)], // Random status
                'email' => strtolower('user' . rand(1, 100) . '@example.com'), // Random email
                'user_type' => ['guest', 'registered'][rand(0, 1)], // Random user type
                'payment_method' => ['credit_card', 'paypal', 'cash'][rand(0, 2)], // Random payment method
                'cancellation_reason' => rand(0, 1) ? null : 'User cancelled for personal reasons.', // Optional cancellation reason
            ]);
        }
    }
}