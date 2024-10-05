<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CaseInsensitiveRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $path = $request->path();

        // Check if the path is not already lowercase
        if ($path !== strtolower($path)) {
            // Redirect to the lowercase version of the URL
            return redirect()->to(strtolower($request->fullUrl()), 301);
        }

        return $next($request);
    }
}
