<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Models\User;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;
        switch ($role) {
            case 'admin':
                if ($userRole == 'admin') {
                    return $next($request);
                }
                break;
            case 'TM':
                if ($userRole == 'TM') {
                    return $next($request);
                }
                break;
            case 'user':
                if ($userRole == 'user') {
                    return $next($request);
                }
                break;
        }



        switch ($userRole) {
            case 'admin':
                return redirect()->route('admin');
            case 'TM':
                return redirect()->route('welcome');
            case 'user':
                return redirect()->route('dashboard');
        }


        return redirect()->route('login');
    }
}
