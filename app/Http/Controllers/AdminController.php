<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Product;
use \App\Brand;
use \App\Order;

class AdminController extends Controller
{
    public function index()
    {
    	return view('admin.index',['active'=>'dashboard']);
    }

    public function user()
    {
    	$user = User::all();
		return view('admin.user',['active'=>'user','data_user'=>$user]);
    }

    public function product()
    {
    	$product = Product::all();
    	return view('admin.product',['active'=>'product','data_product'=>$product]);
    }

    public function brand()
    {
    	$brand = Brand::all();
    	return view('admin.brand',['active'=>'brand','data_brand'=>$brand]);
    }

    public function order()
    {
    	$order = Order::all();
    	return view('admin.order',['active'=>'order','data_order'=>$order]);
    }
}
