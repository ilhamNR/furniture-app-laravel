<?php

namespace App\Http\Controllers\public;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;

class CatalogueController extends Controller
{
    public function index($slug){
        $data = ProductCategory::where('slug', $slug)->first();
        return view('public.catalogue', compact('data'));
    }
}
