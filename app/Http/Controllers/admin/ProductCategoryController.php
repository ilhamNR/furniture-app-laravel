<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Traits\APIResponseTrait;
use GrahamCampbell\ResultType\Success;
use App\Http\Requests\AddProductCategoryRequest;

class ProductCategoryController extends Controller
{
    use APIResponseTrait;
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = ProductCategory::all();

            return Datatables::of($data)
                ->toJson();
        }
        return view('admin.categories');
    }

    public function store(AddProductCategoryRequest $request)
    {
        try {
            DB::beginTransaction();
            ProductCategory::create([
                'name' => $request->name
            ]);
            DB::commit();

            return $this->success(200, 'Category "' . $request->name . '" has been created');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error("failed", 401);
        }
    }

    public function destroy(Request $request)
    {
        try {
            DB::beginTransaction();
            DB::table('product_categories')->whereIn('id', $request->ids)->delete();
            DB::commit();
            return $this->success(200, 'You have deleted all selected categories!.');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error("failed", 401);
        }
    }
}
