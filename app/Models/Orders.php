<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $table = 'orders';

    protected $fillable = [
        'number', 'customer_id', 'duedate', 'note', 'status', 'warehouse', 'planting_id',
        'quantity','unit','product_id',
    ];
}
