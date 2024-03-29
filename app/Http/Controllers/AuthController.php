<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
    	return view('web.login',['active'=>'login']);
    }

    public function postlogin(Request $request)
    {
    	if(Auth::attempt($request->only('email','password'))){
            return redirect('/');
    	}
        return redirect('/login')->with('error','Login Failed');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/login');
    }
}
