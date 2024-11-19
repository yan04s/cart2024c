<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'image', 'quantity', 'categoryID'];

    public function product()
    {
        return $this->belongsTo(Category::class);
    }
}
