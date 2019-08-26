<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {
    	return view('web.home',['active'=>'home']);
    }

    public function shop()
    {
    	return view('web.shop',['active'=>'shop']);
    }

    public function cart()
    {
    	return view('web.cart',['active'=>'cart']);
    }

    public function contact()
    {
    	return view('web.contact',['active'=>'contact']);
    }

}