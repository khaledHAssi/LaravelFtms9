<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo(){
        if(Auth::user()->type == 'super-admin'){
            return '/en/admin';
        }
        elseif(Auth::user()->type == 'companyManager'){
            return '/en/user_dash/cm';
        }
        elseif(Auth::user()->type == 'companySupervisor'){
            return '/en/user_dash/supervisor';
        }
        elseif(Auth::user()->type == 'doctor'){
            return 'en/user_dash/doctor/dash';
        }
        else{
            return '';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
