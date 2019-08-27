<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function getProduct($id)
    {
    	$id_product = \App\Customer::where('id_order',$id)->get('id_product');
    	foreach ($id_product as $id) {
    		$product = \App\Product::find($id);
    	}
    	return $product;
    }
}
