<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

	public function productName($id)
	{
		$product = \App\Product::find($id);
    	return $product->nama;
	}
    public function productImage($id)
    {
    	$product = \App\Product::find($id);
    	return $product->gambar;
    }

    public function productPrice($id)
    {
    	$product = \App\Product::find($id);
    	return $product->harga;	
    }
}
