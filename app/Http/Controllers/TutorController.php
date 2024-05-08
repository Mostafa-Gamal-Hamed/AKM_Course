<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use App\Models\User;
use App\Models\User\countryCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class TutorController extends Controller
{
    public function index()
    {
        $tutors = Tutor::all();
        return view("admin.tutor.tutors",compact("tutors"));
    }

    public function create()
    {
        $countryCode = countryCode::all();
        return view("admin.tutor.addTutor",compact("countryCode"));
    }

    public function store(Request $request)
    {
        // Validation
        $data = $request->validate([
            "name"=>"required|string|min:3",
            "email"=>"required|email|unique:tutors,email|unique:users,email",
            "countryCode"=>"required|numeric|min_digits:1",
            "phone"=>"required|numeric|min_digits:9",
            "gender"=>"required|in:male,female",
            "country"=>"required|string|alpha",
            "city"=>"required|string|alpha",
            "levels"=>"required|string|min:1",
            "sessions"=>"required|numeric|min_digits:1",
            "absence"=>"required|numeric|min_digits:1",
            "image"=>"required|image|mimes:png,jpg,jpeg",
            "startDate"=>"required|date"
        ]);

        // Storage image
        $data['image'] = Storage::putFile("tutors",$data['image']);

        // Insert data
        Tutor::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "gender"=>$request->gender,
            "country"=>$request->country,
            "city"=>$request->city,
            "levels"=>$request->levels,
            "sessions"=>$request->sessions,
            "absence"=>$request->absence,
            "image"=>$data['image'],
            "startDate"=>$request->startDate,
            "country_codes_id"=>$request->countryCode
        ]);

        // Insert data to user table
        User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>bcrypt(12345678),
            "type"=>"tutor"
        ]);

        return redirect()->back()->with("success","Added Successfully");
    }

    public function show(string $id)
    {
        $tutor = Tutor::findOrFail($id);
        $countryCode = countryCode::all();
        return view("admin.tutor.details",compact("tutor","countryCode"));
    }

    public function update(Request $request, string $id)
    {

        // Validation
        $request->validate([
            "name"=>"required|string|min:3",
            "email"=>"required|email",
            "countryCode"=>"required|numeric|min_digits:1",
            "phone"=>"required|numeric|min_digits:9",
            "gender"=>"required|in:male,female",
            "country"=>"required|string|alpha",
            "city"=>"required|string|alpha",
            "levels"=>"required|string|min:1",
            "sessions"=>"required|numeric|min_digits:1",
            "absence"=>"required|numeric|min_digits:1",
            "startDate"=>"required|date"
        ]);

        // Check if tutor exist
        $tutor = Tutor::findOrFail($id);

        // Get tutor from user
        $email = $tutor->email;
        $user  = User::where("email",$email)->first();

        // Check if there is image
        if($request->has("image")){
            $data = $request->validate(["image"=>"required|image|mimes:png,jpg,jpeg"]);
            Storage::delete($tutor->image);
            $data['image'] = Storage::putFile("tutors",$request->image);

            // Insert data
            $tutor->update([
                "name"             =>$request->name,
                "email"            =>$request->email,
                "phone"            =>$request->phone,
                "gender"           =>$request->gender,
                "country"          =>$request->country,
                "city"             =>$request->city,
                "levels"           =>$request->levels,
                "sessions"         =>$request->sessions,
                "absence"          =>$request->absence,
                "startDate"        =>$request->startDate,
                "image"            =>$data['image'],
                "country_codes_id" =>$request->countryCode
            ]);
        }else{
            // Insert data
            $tutor->update([
                "name"             =>$request->name,
                "email"            =>$request->email,
                "phone"            =>$request->phone,
                "gender"           =>$request->gender,
                "country"          =>$request->country,
                "city"             =>$request->city,
                "levels"           =>$request->levels,
                "sessions"         =>$request->sessions,
                "absence"          =>$request->absence,
                "startDate"        =>$request->startDate,
                "country_codes_id" =>$request->countryCode
            ]);
        }

        // Update in user table
        $user->update([
            "name"=>$request->name,
            "email"=>$request->email
        ]);

        return redirect()->back()->with("success","Added Successfully");
    }

    public function destroy(string $id)
    {
        $tutor = Tutor::findOrFail($id);

        // Delete from user
        $email = $tutor->email;
        $user  = User::where("email",$email)->first();
        $user->delete();

        // Delete from tutor
        Storage::delete($tutor->image);
        $tutor->delete();

        return redirect()->back()->with("success","Deleted Successfully");
    }
}
