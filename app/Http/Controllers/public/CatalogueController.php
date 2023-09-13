<?php

namespace App\Http\Controllers\public;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatalogueController extends Controller
{
    public function index($slug){
        return view('public.catalogue', compact('slug'));
    }
}
