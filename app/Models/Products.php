<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Products extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name', 'pn','amount','volat',
        'description', 'tonema', 'factory', 'status','customer_id', 'cu', 'h_ni', 'full_ni', 'm_ni',
        'cr',
    ];


    public function pic(){
        return $this->hasMany('App\Models\ProductPic');
    }
    public function hangers(){
        return $this->hasMany('App\Models\Hangers');
    }
    public function platings(){
        return $this->hasMany('App\Models\Platings');
    }
    public function customers(){
        return $this->hasOne('App\Models\Customers');
    }

    //name pn amount pic hanger_id plating_id volat description tonema factory status
}
