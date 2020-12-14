<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPlantingHanger extends Model
{
    //
    protected $table = 'products_platings_hangers';

    protected $fillable = [
        'product_id', 'hanger_id', 'plating_id'
    ];

    public function productPlantingHanger(){
        return $this->hasManyThrough('App\Models\Proudct', 'App\Models\Hangers', 'App\Models\Platings','product_id', 'hanger_id', 'plating_id');
    }
}
