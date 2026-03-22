<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = 'pl'; // default

        if (auth()->check()) {
            $user = auth()->user();
            if ($user->settings && $user->settings->language) {
                $locale = $user->settings->language;
            }
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
