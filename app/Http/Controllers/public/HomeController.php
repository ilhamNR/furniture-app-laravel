<?php

namespace App\Http\Controllers\public;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function getCategories(){
        $data = ProductCategory::all();
        return ($data);
    }
}
