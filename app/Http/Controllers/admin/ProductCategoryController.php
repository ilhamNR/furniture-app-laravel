<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductCategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ProductCategory::all();

            return Datatables::of($data)
                // ->addColumn('action', function ($row) {
                //     // Add any additional columns or actions you need here
                //     return '<a href="/admin/categories/' . $row->id . '/edit" class="btn btn-primary">Edit</a>';
                // })
                ->toJson();
        }
        return view('admin.categories');
    }
}
