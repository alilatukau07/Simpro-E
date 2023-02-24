<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function register()
    {
        return view('register.index');
    }

    public function authenticate(Request $request)
    {
        // $credentials = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     if (Auth::user()->level == 'Admin') {
        //         return redirect()->intended('home')->with('success', 'Selamat Datang!');
        //     }

        //     if (Auth::user()->level == 'User') {
        //         return redirect()->intended('maintenance')->with('success', 'Selamat Datang!');
        //     }
        // }

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status != 'active') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'failed');
                Session::flash('message', 'Akun kamu sedang diaktivasi admin!');
                return redirect('login');
            }
            // dd(Auth::user());
            $request->session()->regenerate();
            if (Auth::user()->level == 'Admin') {
                return redirect()->intended('home')->with('success', 'Selamat Datang!');
            }

            if (Auth::user()->level == 'User') {
                return redirect()->intended('maintenance')->with('success', 'Selamat Datang!');
            }
        }
        Session::flash('status', 'failed');
        Session::flash('message', 'Login failed kamu belum daftar!');
        return redirect('login');
    }

    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'phone' => 'max:255',
        ]);

        $request['password'] = Hash::make($request->password);
        // dd($request->password);
        $user = User::create($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'Register berhasil, Akun kamu sedang diaktivasi admin!');
        return redirect('register');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
