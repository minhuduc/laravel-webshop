<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table =  'order_detail';

    protected $fillable= [
        'idOder', 'idProduct', 'quantity', 'price'
    ];

    public function Order(){
        return $this->belongsTo('App\Models\Order','idOder','id');
    }
    public function Product(){
        return $this->belongsTo('App\Models\Product','idProduct','id');
    }
}
