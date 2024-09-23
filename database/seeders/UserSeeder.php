<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
            'is_admin' => 1
        ]);

        User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => bcrypt('password'),
            'is_admin' => 0
        ]);

        User::factory()->count(10)->create();

        // Admin user
        $admin = User::create([
            'name' => 'wassim',
            'email' => 'wassim@gmail.com',
            'password' => bcrypt('123456789'),
            'is_admin' => 1
        ]);

        // Demo users
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => 'User '.$i,
                'email' => 'user'.$i.'@example.com', 
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
