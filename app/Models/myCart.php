<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class myCart extends Model
{
    protected $fillable = ['productID', 'userID', 'quantity', 'orderID'];
}
