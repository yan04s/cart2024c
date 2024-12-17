<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class myCart extends Model
{
    protected $fillable = ['productID', 'userID', 'quantity', 'orderID'];

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
