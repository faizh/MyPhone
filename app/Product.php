<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getCategory($id)
    {
    	$category = \App\Category::find($id);
    	return $category->nama;
    }

    public function getImage()
    {
	    return asset('images/product/'.$this->gambar);
    }
}
