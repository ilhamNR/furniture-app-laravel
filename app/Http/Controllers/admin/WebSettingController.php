<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebSetting;
use App\Traits\APIResponseTrait;

class WebSettingController extends Controller
{
    use APIResponseTrait;
    public function aboutUs()
    {
        $about_us = WebSetting::where('name', 'about-us')->first()->value;
        return view('admin.about-us', compact('about_us'));
    }

    public function saveAboutus(Request $request)
    {
        $about_us = WebSetting::where('name', 'about-us')->first();
        try {
            $about_us->update([
                'value' => $request->value
            ]);
            return $this->success(200, '"About Us" has been updated');
        } catch (\Exception $e) {
            return $this->error(422, 'Something Wrong');
        }
    }
}
