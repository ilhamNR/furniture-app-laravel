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
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function thumbnailImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_thumbnail', 1);
    }
}
