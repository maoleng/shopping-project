<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'username', 'password', 'name', 'address', 'phone', 'token'
    ];

//    public function getDateJoinAttribute ()
//    {
//        return $this
//    }
}
