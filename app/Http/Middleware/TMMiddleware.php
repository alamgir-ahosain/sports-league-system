<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class TMMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     if(Auth::user()->role!= 'TM'){
    //         return redirect('dashboard');
     
    //          }
    //     return $next($request);
    // }


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
                return redirect()->route('login');
            case 'TM':
                return redirect()->route('welcome');
            case 'user':
                return redirect()->route('dashboard');
        }


        return redirect()->route('login');
    }
}
