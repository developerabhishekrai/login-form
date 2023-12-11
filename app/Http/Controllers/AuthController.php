<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (auth()->attempt($credentials, $request->has('remember'))) {
            if ($request->has('remember')) {
                $minutes = 60; 
                $email = $request->input('email');
                $password = $request->input('password');
    
                return redirect()->route('welcome')
                    ->withCookie('email', $email, $minutes)
                    ->withCookie('password', $password, $minutes);
                }else{
                    return redirect()->route('welcome')
                        ->withCookie('email', '')
                        ->withCookie('password','');

                }
            }
    
    }
    

    public function welcome()
    {
        return view('welcome');
    }
    public function logout()
    {
        auth()->logout();

        return redirect()->route('loginPage');
    }
}
