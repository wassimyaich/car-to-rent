<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StripeController extends Controller
{
    // public function session(Request $request)
    // {
    //     Log::info('session request', $request->all());

    //     \Stripe\Stripe::setApiKey(config('stripe.sk'));

    //     // Retrieve values from session
    //     $carname = session('carname');
    //     $totalprice = session('totalPrice');

    //     if (! $carname || ! $totalprice) {
    //         return redirect()->route('home')->withErrors(['message' => 'Invalid payment details']);
    //     }

    //     $session = \Stripe\Checkout\Session::create([
    //         'line_items' => [
    //             [
    //                 'price_data' => [
    //                     'currency' => 'USD',
    //                     'product_data' => [
    //                         'name' => $carname,
    //                     ],
    //                     'unit_amount' => $totalprice,
    //                 ],
    //                 'quantity' => 1,
    //             ],
    //         ],
    //         'mode' => 'payment',
    //         'success_url' => route('success'),
    //         'cancel_url' => route('home'),
    //     ]);

    //     return redirect()->away($session->url);

    // }

    public function success()
    {
        return 'Thank you ';
    }
}
