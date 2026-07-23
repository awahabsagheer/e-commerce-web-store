<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Check if user is logged in
        if (!Auth::check()) {
            return redirect('/login');
        }

        // 2. Check if the user is the master admin OR has been promoted to admin
        if (Auth::user()->email !== 'awahabsagheer103@gmail.com' && !Auth::user()->is_admin) { 
            return redirect()->route('products.index');
        }

        return $next($request);
    }
}