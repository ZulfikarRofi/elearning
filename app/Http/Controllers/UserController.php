<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function getAdminLogin()
    {
        return view('adminpages.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ]
        );

        if (Auth::attempt($credentials)) {
            return redirect('/');
        } else {
            return back()->withErrors([
                'email' => 'Invalid Credentials'
            ]);
        }
    }

    public function postLoginSiswa(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ]
        );

        if (Auth::attempt($credentials)) {
            return redirect('/');
        } else {
            return back()->withErrors([
                'email' => 'Invalid Credentials'
            ]);
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'level' => 'required',
            'status' => 'required',
        ]);

        $user =  new Users();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = $request->level;
        $user->status = $request->status;
        $user->guru_id = $request->guru_id;
        $user->siswa_id = $request->siswa_id;
        $user->save();
        // dd($user);


        return redirect()->back()->with('success', 'Data Pengguna Baru Telah Ditambahkan');
    }

    public function getDataPengguna()
    {
        $guru = Guru::all();
        return view('pages.pengguna', compact('guru'));
    }

    public function postLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect('/login');
    }
}
