<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\becomeTutor;
use App\Models\User\contactUs;
use App\Models\User\DemoClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class userController extends Controller
{
    // Contact us
    public function contactUs(Request $request)
    {
        $data = $request->validate([
            "firstName"=>"required|min:3|string",
            "lastName"=>"required|min:3|string",
            "email"=>"required|email",
            "number"=>"required|numeric|min_digits:9",
            "message"=>"required|max:255",
        ]);

        contactUs::create($data);
        return redirect(url("contact"))->with("success","Message Sent Successfully");
    }

    // Become tutor
    public function becomeTutor(Request $request)
    {
        $data = $request->validate([
            "name"=>"required|string|min:3",
            "email"=>"required|email",
            "countryCode"=>"required|exists:country_codes,id",
            "phone"=>"required|numeric|min_digits:9",
            "gender"=>"required|in:male,female",
            "date"=>"required|date",
            "country"=>"required|string",
            "city"=>"required|string",
            "address"=>"required",
            "experience"=>"required|integer",
            "resume"=>"required|file|mimes:pdf,doc,docx,xlsx",
            "video"=>"required|file|mimes:mp4,mov,avi"
        ]);

        // Move Photos and Videos
        $data['resume'] = Storage::putFile("resumes",$data['resume']);
        $data['video']  = Storage::putFile("videos",$data['video']);

        becomeTutor::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "gender"=>$request->gender,
            "date"=>$request->date,
            "address"=>$request->address,
            "country"=>$request->country,
            "city"=>$request->city,
            "experience"=>$request->experience,
            "resume"=>$data['resume'],
            "video"=>$data['video'],
            "country_code_id"=>$request->countryCode,
        ]);
        return redirect(url("becomeTutor"))->with("success","Apply Successfully");
    }

    // tryForFree
    public function tryForFree()
    {
        return view("user.pages.tryForFree");
    }

    // Demo class
    public function storeDemoClass(Request $request)
    {
        // Validation
        $data = $request->validate([
            "firstName"=>"required|min:3|string",
            "lastName"=>"required|min:3|string",
            "email"=>"required|email",
            "number"=>"required|numeric|min_digits:9",
            "dateTime"=>"required|date_format:Y-m-d\TH:i",
        ]);

        // Check if guest took the demo class
        $exist = DemoClass::where("email",$request->email)->first();
        if($exist){
            return redirect(url("/"))->with("error","You already get the demo class");
        }

        // Insert data
        DemoClass::create($data);

        return redirect(url("/"))->with("success","Thank you We will Contact you soon");
    }

    // Checkout
    public function checkout(Request $request, string $id)
    {
        return "$id";
    }
}