<?php

use Illuminate\Support\Facades\Route;

<<<<<<< HEAD
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
=======
Route::get('/', function () {
    return view('frontend.index');
})->name('home');
>>>>>>> parent of 318461b (add strip payment)

Route::get('/about', function () {
    return view('frontend.about');
})->name('about');
Route::get('/services', function () {
    return view('frontend.services');
})->name('services');
Route::get('/pricing', function () {
    return view('frontend.pricing');
});

Route::get('/carSingle/{slug}', function () {
    return view('frontend.car-single');
});
Route::get('/contact', function () {
    return view('frontend.contact');
});
Route::get('/blog', function () {
    return view('frontend.blog');
});
Route::get('/BlogSingle', function () {
    return view('frontend.blog-single');
});


use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('postlogin');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('postregister');

Route::group(['prefix' => 'user', 'middleware' => 'auth:web'], function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::get('/cart/{slug}', [CartController::class, 'index'])->name('cart.index');
});

Route::get('/car', [CarController::class, 'index'])->name('car.index');
// ->middleware('check.referrer');

