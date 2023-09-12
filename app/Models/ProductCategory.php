<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class ProductCategory extends Model
{
    use HasFactory, Sluggable;
    protected $fillable = [
        'name',
        'slug',
    ];
}
