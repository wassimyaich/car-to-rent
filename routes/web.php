<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\StripeController;
use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::middleware(['case-insensitive'])->group(function () {
    Route::get('/singlecar/{slug}', function () {
        return view('frontend.car-single');
    });

    Route::get('/contact', function () {
        return view('frontend.contact');
    });
    Route::get('/', function () {
        return view('frontend.index');
    })->name('home');

    Route::get('/about', function () {
        return view('frontend.about');
    })->name('about');
    Route::get('/services', function () {
        return view('frontend.services');
    })->name('services');
    Route::get('/pricing', function () {
        return view('frontend.pricing');
    });
    Route::get('/blog', function () {
        return view('frontend.blog');
    });
    Route::get('/BlogSingle', function () {
        return view('frontend.blog-single');
    });

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('postlogin');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('postregister');

    Route::group(['middleware' => 'auth:web'], function () {

        Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
        Route::get('/cart/{slug}', [CartController::class, 'index'])->name('cart.index');
    });

    Route::get('/car', [CarController::class, 'index'])->name('car.index');
    // Route::post('/session', [StripeController::class, 'session'])->name('session');
    Route::get('/success', [StripeController::class, 'success'])->name('success');

    Route::get('/reservations/{reservation}/approve', [ReservationController::class, 'approve'])
        ->name('reservations.approve');
});

// ->middleware('check.referrer');
// Route::get('/test', function () {
//     $recipients = User::where('is_admin', 1)->get();
//     Log::info('Admins retrieved: '.$recipients->count());

//     // Log the created user's name

//     // Check if there are recipients
//     if ($recipients->isNotEmpty()) {
//         // Log each admin user
//         foreach ($recipients as $recipient) {
//             Log::info('User created by: '.$recipient->name);

//             // Notify the newly created user about their profile creation

//             // Notify all admins about new user creation
//             if ($recipient instanceof User && $recipient->isAdmin()) {
//                 Log::info('Sent to admin: '.$recipient);

//                 Notification::make()
//                     ->title('New User Created')
//                     ->body('User has been created.')
//                     ->sendToDatabase($recipient);
//                 // ->broadcast($recipient);
//             }
//         }
//     } else {
//         Log::info('User created, but no authenticated user found.');
//     }
//     //////////////////////////////////////
//     // Log::info('reception'.$reception->all());
//     // \Filament\Notifications\Notification::make()
//     //     ->title('sending message')
//     //     // ->sendToDatabase($reception);
//     //     ->broadcast($reception);
//     dd('done sending');
// })->name('test');
