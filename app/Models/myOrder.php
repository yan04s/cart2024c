<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class myOrder extends Model
{
    protected $fillable=['paymentStatus','userID','amount'];
}
