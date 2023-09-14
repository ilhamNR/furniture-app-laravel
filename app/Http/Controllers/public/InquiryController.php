<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Traits\APIResponseTrait;

class InquiryController extends Controller
{
    use APIResponseTrait;
    public function index()
    {
        return view('public.contact');
    }

    public function sendInquiry(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        // Create a new Inquiry model instance and save it to the database
        $inquiry = new Inquiry();
        $inquiry->first_name = $validatedData['first_name'];
        $inquiry->last_name = $validatedData['last_name'];
        $inquiry->email = $validatedData['email'];
        $inquiry->phone = $validatedData['phone'];
        $inquiry->message = $validatedData['message'];
        $inquiry->save();

        // You can return a response here if needed
        return response()->json(['message' => 'Inquiry submitted successfully'], 200);
    }
}
