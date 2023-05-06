<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)) {

            $request->session()->regenerate();
            return redirect()->intended('courses');

        } 


        return back()->withErrors([
            'email' => 'The provided credentials do not match.'
        ])->onlyInput('email');



    }
}
