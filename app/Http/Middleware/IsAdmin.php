<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;



class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
{
    if (Auth::check()) {
        if (Auth::user()->is_admin) {
            return $next($request);
        }
        Log::info()('User is not an admin: ' . Auth::user()->id);
        return redirect('/')->with('error', 'You are not authorized to access this page.');
    }
  
    Log::info('User is not authenticated.');
    return redirect('/')->with('error', 'Please log in to continue.');
}

}
