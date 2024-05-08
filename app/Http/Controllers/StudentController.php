<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\User\countryCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view("admin.student.students",compact("students"));
    }

    public function create()
    {
        $countryCode = countryCode::all();
        return view("admin.student.addStudent",compact("countryCode"));
    }

    public function store(Request $request)
    {
        // Validation
        $data = $request->validate([
            "name"=>"required|string|min:3",
            "email"=>"required|email|unique:students,email|unique:users,email",
            "countryCode"=>"required|numeric|min_digits:1",
            "phone"=>"required|numeric|min_digits:9",
            "gender"=>"required|in:male,female",
            "country"=>"required|string|alpha",
            "city"=>"required|string|alpha",
            "payment"=>"required|in:cash,installment",
            "amount"=>"required|integer|min_digits:1",
            "Paid"=>"required|date",
            "startDate"=>"required|date",
            "level"=>"required|integer|between:1,14",
            "image"=>"required|image|mimes:png,jpg,jpeg"
        ]);

        // Insert data
        if($request->get("remaining") && $request->get("paymentDate")){
            $request->validate([
                "remaining"=>"required|integer|min_digits:1",
                "paymentDate"=>"required|date",
            ]);

            // Storage image
            $data['image'] = Storage::putFile("students",$request->image);

            Student::create([
                "name"=>$request->name,
                "email"=>$request->email,
                "phone"=>$request->phone,
                "gender"=>$request->gender,
                "country"=>$request->country,
                "city"=>$request->city,
                "payment"=>$request->payment,
                "amount"=>$request->amount,
                "remaining"=>$request->remaining,
                "paymentDate"=>$request->paymentDate,
                "Paid"=>$request->Paid,
                "startDate"=>$request->startDate,
                "level"=>$request->level,
                "image"=>$data['image'],
                "country_codes_id"=>$request->countryCode
            ]);
        }else{
            // Storage image
            $data['image'] = Storage::putFile("students",$request->image);

            Student::create([
                "name"=>$request->name,
                "email"=>$request->email,
                "phone"=>$request->phone,
                "gender"=>$request->gender,
                "country"=>$request->country,
                "city"=>$request->city,
                "payment"=>$request->payment,
                "amount"=>$request->amount,
                "Paid"=>$request->Paid,
                "startDate"=>$request->startDate,
                "level"=>$request->level,
                "image"=>$data['image'],
                "country_codes_id"=>$request->countryCode
            ]);
        }

        // Insert data to user table
        User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>bcrypt(12345678),
            "type"=>"student"
        ]);

        return redirect()->back()->with("success","Added Successfully");
    }

    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        $countryCode = countryCode::all();
        return view("admin.student.details",compact("student","countryCode"));
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
            "payment"=>"required|in:cash,installment",
            "amount"=>"required|integer|min_digits:1",
            "Paid"=>"required|date",
            "startDate"=>"required|date",
            "level"=>"required|integer|between:1,14"
        ]);

        // Check if exist
        $student = Student::findOrFail($id);

        // Get tutor from user
        $email = $student->email;
        $user  = User::where("email",$email)->first();

        // Insert data
        if($request->get("remaining") && $request->get("paymentDate")){
            $request->validate([
                "remaining"=>"required|integer|min_digits:1",
                "paymentDate"=>"required|date",
            ]);

            // Storage image
            if($request->has("image")){
                $data = $request->validate(["image"=>"required|image|mimes:png,jpg,jpeg"]);
                Storage::delete($student->image);
                $data['image'] = Storage::putFile("students",$request->image);

                $student->update([
                    "name"=>$request->name,
                    "email"=>$request->email,
                    "phone"=>$request->phone,
                    "gender"=>$request->gender,
                    "country"=>$request->country,
                    "city"=>$request->city,
                    "payment"=>$request->payment,
                    "amount"=>$request->amount,
                    "remaining"=>$request->remaining,
                    "paymentDate"=>$request->paymentDate,
                    "Paid"=>$request->Paid,
                    "startDate"=>$request->startDate,
                    "level"=>$request->level,
                    "image"=>$data['image'],
                    "country_codes_id"=>$request->countryCode
                ]);
            }

            $student->update([
                "name"=>$request->name,
                "email"=>$request->email,
                "phone"=>$request->phone,
                "gender"=>$request->gender,
                "country"=>$request->country,
                "city"=>$request->city,
                "payment"=>$request->payment,
                "amount"=>$request->amount,
                "remaining"=>$request->remaining,
                "paymentDate"=>$request->paymentDate,
                "Paid"=>$request->Paid,
                "startDate"=>$request->startDate,
                "level"=>$request->level,
                "country_codes_id"=>$request->countryCode
            ]);
        }else{
            // Storage image
            if($request->has("image")){
                $data = $request->validate(["image"=>"required|image|mimes:png,jpg,jpeg"]);
                Storage::delete($student->image);
                $data['image'] = Storage::putFile("students",$request->image);

                $student->update([
                    "name"=>$request->name,
                    "email"=>$request->email,
                    "phone"=>$request->phone,
                    "gender"=>$request->gender,
                    "country"=>$request->country,
                    "city"=>$request->city,
                    "payment"=>$request->payment,
                    "amount"=>$request->amount,
                    "remaining"=>$request->remaining,
                    "paymentDate"=>$request->paymentDate,
                    "Paid"=>$request->Paid,
                    "startDate"=>$request->startDate,
                    "level"=>$request->level,
                    "image"=>$data['image'],
                    "country_codes_id"=>$request->countryCode
                ]);
            }

            $student->update([
                "name"=>$request->name,
                "email"=>$request->email,
                "phone"=>$request->phone,
                "gender"=>$request->gender,
                "country"=>$request->country,
                "city"=>$request->city,
                "payment"=>$request->payment,
                "amount"=>$request->amount,
                "Paid"=>$request->Paid,
                "startDate"=>$request->startDate,
                "level"=>$request->level,
                "country_codes_id"=>$request->countryCode
            ]);
        }

        // Update in user table
        $user->update([
            "name"=>$request->name,
            "email"=>$request->email
        ]);

        return redirect()->back()->with("success","Update Successfully");
    }

    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);

        // Delete from user
        $email = $student->email;
        $user  = User::where("email",$email)->first();
        $user->delete();

        // Delete from tutor
        Storage::delete($student->image);
        $student->delete();
        return redirect()->back()->with("success","Deleted Successfully");
    }
}
