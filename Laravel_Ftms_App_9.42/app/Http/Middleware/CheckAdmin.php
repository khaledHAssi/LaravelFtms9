<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        if (Auth::user()->type != 'super-admin') {
            switch (Auth::user()->type) {
                case 'companyManager':
                    return redirect()->route('user_dash.cmindex');
                    break;
                case 'companySupervisor':
                    return redirect()->route('user_dash.supervisor.index');
                    break;
                case 'doctor':
                    return redirect()->route('user_dash.doctor.dash.index');
                    break;
                default:
                    return redirect()->route('site.index');
            }
        }
        return $next($request);
        // if (Auth::user()->type != 'super-admin') {return redirect()->back();}
    }
}
