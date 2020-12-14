<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Users extends Authenticatable
{
    //
    protected $table = 'users';

    protected $fillable = [
        'account', 'password', 'model', 'status'
    ];
    protected $hidden = [
        'password',
    ];

    public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();

        return $this->api_token;
    }
}
