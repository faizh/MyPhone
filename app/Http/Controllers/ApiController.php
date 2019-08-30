<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\Cart;

class ApiController extends Controller
{
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
    		return redirect()->back();
    	}
		return redirect('/login');
    }
}
