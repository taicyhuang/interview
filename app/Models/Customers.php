<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    //
    protected $table = 'customers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'tax', 'mobile','fax','address','contact','defective_rate'
    ];

    /**
     * customer has many hangers
     */
    public function hangers(){
        return $this->hasMany('App\Models\Hangers');
    }
    /**
     * customer has many pics
     */
    public function pic(){
        return $this->hasMany('App\Models\ProductPic');
    }
    /**
     * customer has many products
     */
    public function products(){
        return $this->hasMany('App\Models\Products');
    }
    /**
     * customer has many Plating
     */
    public function platings(){
        return $this->hasMany('App\Models\platings');
    }

}
