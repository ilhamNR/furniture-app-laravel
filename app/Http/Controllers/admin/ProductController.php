<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::all();
            $data = $data->map(function ($item) {
                $item->category = ProductCategory::findOrFail($item->product_category_id)->name;
                return ($item);
            });
            // dd($data);
            return Datatables::of($data)
                ->toJson();
        }
        return view('admin.product.index');
    }

    public function create(Request $request)
    {
        return view('admin.product.create');
    }
}
