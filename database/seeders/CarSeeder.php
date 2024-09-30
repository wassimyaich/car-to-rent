<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Type;
use App\Models\Brand;
use App\Models\State;
use App\Models\Country;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    public function run()
    {
        // Define how many cars you want to create
        $numberOfCars = 50;

        // Define fixed image names
        $imageNames = [
            'car-images/car1.jpg',
            'car-images/car2.jpg'
        ];

        // Loop to create multiple car entries
        for ($i = 0; $i < $numberOfCars; $i++) {
            Car::create([
                'name' => 'Car ' . ($i + 1),
                'category_id' => Category::inRandomOrder()->first()->id,
                'type_id' => Type::inRandomOrder()->first()->id,
                'brand_id' => Brand::inRandomOrder()->first()->id,
                'country_id' => Country::inRandomOrder()->first()->id,
                'state_id' => State::inRandomOrder()->first()->id,
                'technical_inspection' => now()->addMonths(rand(1, 12)), // Random future date
                'image_path' => $imageNames, // Store image paths as JSON
                'year' => rand(2000, 2023), // Random year between 2000 and 2023
                'license_plate' => strtoupper(Str::random(3) . '-' . rand(100, 999)), // Random license plate
                'daily_rate' => rand(50, 500), // Random daily rate between $50 and $500
                'description' => 'Description for Car ' . ($i + 1),
                'is_available' => (bool)rand(0, 1), // Random availability
                'show_on_website' => (bool)rand(0, 1), // Random visibility on website
                'slug' => strtolower(str_replace(' ', '-', 'Car ' . ($i + 1))), // Generate slug
                'keywords' => 'car, vehicle, auto',
                'features' => json_encode(['Air Conditioning', 'Navigation System', 'Bluetooth']), // Example features
                'is_insured' => (bool)rand(0, 1), // Random insurance status
            ]);
        }
    }
}