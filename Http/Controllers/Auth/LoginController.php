<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

     public function redirectTo()
    {
        switch (Auth::user()->role) {
            case 1:
                $this->redirectTo = '/admin';
                return $this->redirectTo;
                break;
            
            case 2:
                $this->redirectTo = '/user';
                return $this->redirectTo;
                break;
            
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
                break;
        }
    }

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
