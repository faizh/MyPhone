<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UserController extends Controller
{
    public function register()
    {
    	return view('web.register',['active'=>'login']);
    }

    public function postregister(Request $request)
    {
    	$user = new User;
    	$user->nama_depan = $request->nama_depan;
    	$user->nama_belakang = $request->nama_belakang;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->idcard = $request->idcard;
    	$user->telepon =$request->telepon;
    	$user->alamat = $request->alamat;
    	$user->remember_token = str_random(10);
    	$user->save();

    	return redirect('/login');
    }
}
