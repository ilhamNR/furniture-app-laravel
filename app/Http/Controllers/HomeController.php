<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;

class HomeController extends Controller
{
    public function getCategories(){
        $data = ProductCategory::all();
        return ($data);
    }
}
