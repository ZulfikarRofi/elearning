<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';
    protected $guard = 'admin';


    public function getLogin()
    {
        return view('adminpages.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard($this->guard)->attempt($credentials)) {
            return redirect()->intended($this->redirectTo);
        }

        return back()->withErrors([
            'email' => 'Invalid Credentials',
        ]);
    }
}
