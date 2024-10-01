<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Reservation::where('user_id',Auth::id())->get(); // Get all cart items
        $cartCount = Reservation::where('user_id',Auth::id())->count(); 

        return view('frontend.cart.index', compact('cartItems', 'cartCount'));
    }
}
