<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'code_oder', 'idUser', 'name', 'address', 'email', 'phone', 'money', 'message', 'status'
    ];

    public function User(){
        return $this->belongsTo('App\Models\User','idUser','id');
    }
}
