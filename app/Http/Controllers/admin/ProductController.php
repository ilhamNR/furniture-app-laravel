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
        $category = ProductCategory::all();
        return view('admin.product.index', compact('category'));
    }

    public function create(Request $request)
    {
        $category = ProductCategory::all();
        // dd($category);
        return view('admin.product.create', compact('category'));
    }

    public function uploadImage(Request $request)
    {
                // Validate the uploaded file
                $request->validate([
                    'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240', // Adjust file types and size as needed
                ]);

                // Get the uploaded file
                $image = $request->file('file');

                // Generate a unique filename
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();

                // Save the file to the private folder
                $image->storeAs('private', $filename, 'local'); // Assumes you've set up the "local" disk in config/filesystems.php

                // Return the filename or the full URL if needed
                return response()->json(['filename' => $filename]);
    }
    public function deleteTemporaryImage(Request $request)
    {

    }
}
