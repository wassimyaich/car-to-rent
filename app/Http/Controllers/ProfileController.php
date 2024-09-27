<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Joaopaulolndev\FilamentEditProfile\Pages\EditProfilePage;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('frontend.profile', [
            'profileForm' => EditProfilePage::class,
        ]); // A custom Blade view for editing profile
    }
}