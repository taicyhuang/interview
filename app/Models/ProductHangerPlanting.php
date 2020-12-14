<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductHangerPlanting extends Model
{
    //
    protected $table = 'products_platings_hangers';


    protected $fillable = [
        'product_id', 'hanger_id', 'plating_id'
    ];
}
