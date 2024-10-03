<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckReferrer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedReferrer = url('192.168.1.5:8000/car'); // Change this to your actual allowed page URL

        // Get the referer header
        $referer = $request->headers->get('referer');

        // Log the referer for debugging purposes
        Log::info('Referrer: ' . $referer);

        // Check if the referer is set and matches your criteria
        if (is_null($referer) || strpos($referer, parse_url($allowedReferrer, PHP_URL_HOST)) === false) {
            return redirect('/'); // Redirect to home or any other page if accessed directly
        }

        return $next($request);
    }
    }

