<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function getCategory($id)
    {
    	$category = \App\Category::find($id);
    	return $category->nama;
    }
}
