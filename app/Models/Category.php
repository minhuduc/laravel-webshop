<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table ="category";

    protected $fillable = [
        'name','slug','status'
    ];

    //tao lien ket
    public function ProductType(){
        return $this->hasMany('App\Models\ProductType','idCategory','id');
    }
}
