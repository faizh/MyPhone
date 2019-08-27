<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\Cart;
use \App\Product;
use \App\Order;
use \App\Customer;

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

    public function deletecart($id)
    {
    	$cart = Cart::find($id);
    	$cart->delete();
    	return redirect('/cart');
    }

    public function product($id)
    {
    	$product = Product::find($id);
    	return view('order.product',['active'=>'shop','product'=>$product]);
    }

    public function checkout()
    {
    	$checkout = Cart::where('id_user',Auth::user()->id)->get();
    	return view('order.checkout',['active'=>'shop','checkout'=>$checkout]);
    }

    public function order(Request $request)
    {
    	$order = new Order;
    	$order->id_user = Auth::user()->id;
    	$order->code_order = str_random(15);
    	$order->total_payment = $request->total_payment;
    	$order->status = 0;
    	$order->save();

    	$product_paid = Cart::where('id_user',Auth::user()->id)->get();
    	foreach ($product_paid as $p) {
	    	$customer = new Customer;
	    	$customer->id_order = $order->id;
	    	$customer->id_product = $p->id_product;
	    	$customer->save();
	    	$p->delete();
    	}

    	return redirect('/');
    }

    public function yourorder()
    {
    	$order = Order::where('id_user',Auth::user()->id)->get();
    	foreach ($order as $o) {
	    	$id_product = Customer::where('id_order',$o->id)->get('id_product');
	    	foreach ($id_product as $id) {
	    		$product[] = Product::find($id);
	    	}
    	}
    	return view('order.your_order',['active'=>'order','order'=>$order,'product'=>$product]);
    }
}
