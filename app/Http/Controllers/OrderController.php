<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\Cart;
use \App\Product;
use \App\Order;
use \App\Customer;
use \App\Favorite;

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
    		$cart->quantity = 1;
    		$cart->save();
    		return redirect()->back();
    	}
		return redirect('/login');
    }

    public function addcartpost($id, Request $request)
    {
    	if(Auth::check()){
    		$cart = new Cart;
    		$cart->id_user = Auth::user()->id;
    		$cart->id_product = $id;
    		if($request->has('qty')){
    			$cart->quantity = $request->qty;
    		}else{
	    		$cart->quantity = 1;
    		}
    		$cart->save();
    		return redirect()->back();
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

    public function checkout(Request $request)
    {
    	$checkout = Cart::where('id_user',Auth::user()->id)->get();
    	foreach ($checkout as $c) {
    		$qty = "qty".$c->id;
    		$checked = "check".$c->id;
    		$c->quantity = $request->$qty;
    		$c->checked = $request->$checked;
    		$c->save();
    	}
    	return view('order.checkout',['active'=>'shop','checkout'=>$checkout]);
    }

    public function order(Request $request)
    {
    	$order = new Order;
    	$order->id_user = Auth::user()->id;
    	$order->code_order = str_random(5);
    	$order->total_payment = $request->total_payment;
    	$order->status = 0;
    	$order->save();

    	$product_paid = Cart::where('id_user',Auth::user()->id)->get();
    	foreach ($product_paid as $p) {
	    	$customer = new Customer;
	    	$customer->id_order = $order->id;
	    	$customer->id_product = $p->id_product;
	    	$customer->quantity=$p->quantity;
	    	$customer->save();
	    	$p->delete();
    	}
    	$data_order = Order::find($order->id);
    	$bank = $request->bank;

    	return view('order.transfer',['active'=>'shop','order'=>$data_order,'bank'=>$bank]);
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

    public function transfer($id)
    {
    	$order = Order::find($id);
    	return view('order.transfer',['active'=>'shop','order'=>$order]);
    }

    public function complete(Request $request)
    {
    	$order = Order::find($request->id_order);
    	if($request->hasFile('proof')){
    		$file_extension = $request->file('proof')->getClientOriginalExtension();
    		$filename = "proof".$order->id.".".$file_extension;
    		$request->file('proof')->move('images/proof/',$filename);
            $order->proof_payment = $filename;
            $order->save();
        }
        return redirect('/yourorder');
    }

    public function categories(Request $request)
    {
    	dd($request);
    }

    public function wishlist()
    {
    	$wishlist = Favorite::where('id_user',Auth::user()->id)->get();
    	return view('order.wishlist',['active'=>'wishlist','wishlist'=>$wishlist]);
    }

    public function addwishlist($id)
    {
    	$fav = new Favorite;
    	$fav->id_user = Auth::user()->id;
    	$fav->id_product = $id;
    	$fav->save();
    	return redirect()->back();
    }

    public function deletewishlist($id)
    {
    	$fav = Favorite::find($id);
    	$fav->delete();
    	return redirect()->back();
    }
}
