<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $fillable =[
        'idUser', 'address', 'phone'
        ];
    
    public function User(){
        return $this->belongsTo('App\Models\User','idUser','id');
    }
}
