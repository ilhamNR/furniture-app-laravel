<?php

namespace App\Http\Controllers\public;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;

class CatalogueController extends Controller
{
    public function index($slug){
        if ($slug === 'all'){
            $data = ProductCategory::get();
        }
        else {
            $data = ProductCategory::where('slug', $slug)->get();
        }
        return view('public.catalogue', compact('data'));
    }
}
