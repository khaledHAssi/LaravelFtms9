<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckDoctor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->type != 'doctor') {
            switch (Auth::user()->type) {
                case 'super-admin':
                    return redirect()->route('admin.index');
                    break;
                case 'companyManager':
                    return redirect()->route('user_dash.cmindex');
                    break;
                case 'companySupervisor':
                    return redirect()->route('user_dash.supervisor.index');
                    break;
                default:
                    return redirect()->route('site.index');
            }
        }
        return $next($request);
        // if (Auth::user()->type != 'doctor') {return redirect()->back();}
    }
}
