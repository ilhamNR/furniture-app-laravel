<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminInquiryController extends Controller
{
    public function index()
    {
        return view('admin.inquiry.index');
    }
}
