<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected  $table = "products";
    protected $fillable = [
        'category_id',
        'name',
        'price',
        'discount',
        'final_price',
        'description',
        'sold_out',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function cartitem()
    {
        return $this->hasMany(Product::class);
    }
}
