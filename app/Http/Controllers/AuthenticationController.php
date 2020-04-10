<?php

namespace App\Http\Controllers;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login() {

        $email = Request()->post('email');
        $password = Request()->post('password');

        if(Auth::attempt(['email'=>$email, 'password'=>$password])) {
            return redirect()->route('home');
        } else {
            throw new AuthenticationException();
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
