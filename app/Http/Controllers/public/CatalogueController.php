<?php

namespace App\Http\Controllers\public;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class CatalogueController extends Controller
{
    public function index($slug){
        if ($slug === 'all'){
            // $products = ProductCategory::get();
            $products = Product::with('category')->get();
        }
        else {
            $products = Product::whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->get();
        }
        // dd($products);
        return view('public.catalogue', compact('products'));
    }
}
