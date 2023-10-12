<?php

namespace App\Http\Controllers\public;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WebSetting;

class AboutUsController extends Controller
{
    public function index(){
        $about_us = WebSetting::where('name', 'about-us')->first()->value;
        return view('public.about', compact('about_us'));
    }
}
