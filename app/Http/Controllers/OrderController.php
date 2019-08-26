<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\Cart;
use \App\Product;

class OrderController extends Controller
{
	public function cart()
    {
    	$cart = Cart::where('id_user',Auth::user()->id)->get();
    	return view('web.cart',['active'=>'cart','cart'=>$cart]);
    }

    public function addcart($id)
    {
    	if(Auth::check()){
    		$cart = new Cart;
    		$cart->id_user = Auth::user()->id;
    		$cart->id_product = $id;
    		if(isset($quantity)){
    			$cart->quantity = $quantity;
    		}else{
	    		$cart->quantity = 1;
    		}
    		$cart->save();
    		return redirect('/cart');
    	}
		return redirect('/login');
    }
}
