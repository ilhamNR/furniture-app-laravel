<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebSetting;
use App\Traits\APIResponseTrait;
use Illuminate\Support\Facades\DB;
class WebSettingController extends Controller
{
    use APIResponseTrait;
    public function aboutUs()
    {
        $about_us = WebSetting::where('name', 'about-us')->first()->value;
        return view('admin.about-us', compact('about_us'));
    }

    public function updateAboutus(Request $request)
    {
        // dd($request->value);
        $about_us = WebSetting::where('name', 'about-us')->first();
        try {
            DB::beginTransaction();
            $about_us->update([
                'value' => $request->value
            ]);
            DB::commit();
            return $this->success(200, '"About Us" has been updated');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error(422, 'Something Wrong');
        }
    }
}
