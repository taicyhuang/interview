<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hangers extends Model
{
    //掛具
    protected $table = 'hangers';

    protected $fillable = [
        'name'
    ];

    // public function product(){
    //     return $this->hasMany('App\Models\Customers');
    // }
}
