<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Reservation::content(); // Get all cart items
        return view('frontend.cart.index', compact('cartItems'));
    }
}
