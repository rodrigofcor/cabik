<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\User;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $credentialsForEmail = [
            'email' => $request->login, 
            'password' => $request->password
        ];

        $credentialsForId = [
            'id' => $request->login, 
            'password' => $request->password
        ];

        if (Auth::attempt($credentialsForEmail) || Auth::attempt($credentialsForId)) 
        {
            $request->session()->regenerate();

           return redirect()->intended('/');
        } else {
            return back()->withErrors([
                'login' => 'Credenciais inválidas.',
            ])->onlyInput('login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate(); 
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
