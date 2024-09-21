<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/about', function () {
    return view('frontend.about');
})->name('about');
Route::get('/services', function () {
    return view('frontend.services');
})->name('services');
Route::get('/pricing', function () {
    return view('frontend.pricing');
});
Route::get('/car', function () {
    return view('frontend.car');
});
Route::get('/carSingle', function () {
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