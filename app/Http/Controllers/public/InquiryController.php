<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Traits\APIResponseTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SendInquiryRequest;

class InquiryController extends Controller
{
    use APIResponseTrait;
    public function index()
    {
        return view('public.contact');
    }

    public function sendInquiry(SendInquiryRequest $request)
    {
        // Create a new Inquiry model instance and save it to the database
        try {
            DB::beginTransaction();
            $inquiry = new Inquiry();
            $inquiry->first_name = $request['first_name'];
            $inquiry->last_name = $request['last_name'];
            $inquiry->email = $request['email'];
            $inquiry->phone = $request['phone'];
            $inquiry->message = $request['message'];
            $inquiry->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error("failed", 401);
        }
        return $this->success(200, "Your request has been sent, we will contact you shortly");
    }
}
