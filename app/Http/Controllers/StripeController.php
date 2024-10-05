<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StripeController extends Controller
{
    public function session(Request $request)
    {
        Log::info('session request', $request->all());
        $carname = $request->get('carname');
        $totalprice = $request->get('totalPrice');

    }

    public function success()
    {
        return 'Thank you ';
    }
}
