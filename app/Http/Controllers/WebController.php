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
        $category = \App\Category::all();
        $brand = \App\Brand::all();
        $product = \App\Product::all();
    	return view('web.shop',['active'=>'shop','category'=>$category,'brand'=>$brand,'product'=>$product]);
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