<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;

class Product extends Model
{
    protected $fillable = [
        'name',
        'product_category_id',
        'price',
        'is_available',
        'description'
    ];
    use HasFactory;

    public function images()
    {
        $this->hasMany(ProductImage::class);
    }
}
