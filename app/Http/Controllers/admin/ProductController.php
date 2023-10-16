<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Traits\APIResponseTrait;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    use APIResponseTrait;
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

    public function moveImageToPublic($product_id, $filename, $is_thumbnail)
    {
        if ($is_thumbnail == TRUE){
            $is_thumbnail = 1;
        }
        else{
            $is_thumbnail= 0;
        }
        // Get the file path from the private folder
        $privateFilePath = 'private/' . $filename;
        // Define the new public path for the file
        $publicPath = 'public/product_img/' . $filename;
        // Move the file to the public folder
        Storage::move($privateFilePath, $publicPath);
        // Make product image entity
        ProductImage::create([
            'product_id' => $product_id,
            'file_name' => $filename,
            'is_thumbnail' => $is_thumbnail
        ]);
    }
    public function saveProduct(Request $request)
    {
        if ($request->is_available == 'on') {
            $is_available = 1;
        } else {
            $is_available = 0;
        }
        $photos_data = json_decode($request->photos_data, true);
        $thumbnail_data = json_decode($request->thumbnail_data, true);

        try {
            DB::beginTransaction();
            $data = Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'product_category_id' => $request->category,
                'description' => $request->description,
                'is_available' => $is_available
            ]);
            foreach ($photos_data as $photo) {
                ProductController::moveImageToPublic($data->id, $photo, FALSE );
            };
            foreach ($thumbnail_data as $thumbnail) {
                ProductController::moveImageToPublic($data->id, $thumbnail, TRUE );
            };
            // dd($data->id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error('Something Wrong', 422);
        }
    }
}
