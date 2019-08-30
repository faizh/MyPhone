<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function getProductName($id)
    {
    	$product = \App\Product::find($id);
    	return $product->nama;
    }

    public function getProductImage($id)
    {
    	$product = \App\Product::find($id);
    	return $product->gambar;
    }
}
