<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'Products';

    protected $fillable = [
        'name','slug','description','quantity','price','promotional','idCategory','idProductType'
    ];

    public function ProductType(){
        return $this->belongsTo('App\Models\ProductType','idProductType','id');
    }
    public function Category(){
        return $this->belongsTo('App\Models\Category','idCategory','id');
    }

}
