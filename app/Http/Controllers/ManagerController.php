<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        $users = User::orderByRaw("FIELD(type, 'admin') DESC")
        ->orderBy('id','ASC')->get();
        return view("admin.manager.managers", compact("users"));
    }

    public function create()
    {
        return view("admin.manager.addManager");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name"     => "required|string|min:3",
            "email"    => "required|email|unique:users,email|unique:students,email|unique:tutors,email",
            "password" => "required|numeric|min_digits:8|confirmed"
        ]);

        User::create([
            "name"     => $request->name,
            "email"    => $request->email,
            "password" => $request->password,
            "type"     => "admin",
        ]);
        return redirect()->back()->with("success", "Added Successfully");
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);

        // check if admin or not
        if ($user->type === "admin") {
            abort(404);
        }

        return view("admin.manager.details", compact("user"));
    }

    public function update(Request $request, string $id)
    {
        // Check if exist
        $user = User::findOrFail($id);

        // Get email
        $email = $user->email;

        // Validation
        $request->validate([
            "name" => "required|string|min:3",
            "email" => "required|email|string"
        ]);

        // Check the email if change it
        if ($request->email != $email) {
            $request->validate([
                "email" => "required|email|string|unique:users,email|unique:students,email|unique:tutors,email"
            ]);
        }

        // Check password
        if ($request->get("password")) {
            $request->validate([
                "password" => "required|numeric|min_digits:8|confirmed"
            ]);

            // Insert data in user table
            $user->update([
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password
            ]);

            // Insert data to the other table
            // Tutor
            if($user->type == "tutor"){
                $tutor = Tutor::where("email",$email)->first();
                $tutor->update([
                    "name" => $request->name,
                    "email" => $request->email
                ]);
            }
            // Student
            if($user->type == "student"){
                $student = Student::where("email",$email)->first();
                $student->update([
                    "name" => $request->name,
                    "email" => $request->email
                ]);
            }
        } else {
            // Insert data in user table
            $user->update([
                "name" => $request->name,
                "email" => $request->email
            ]);

            // Insert data to the other table
            // Tutor
            if($user->type == "tutor"){
                $tutor = Tutor::where("email",$email)->first();
                $tutor->update([
                    "name" => $request->name,
                    "email" => $request->email
                ]);
            }
            // Student
            if($user->type == "student"){
                $student = Student::where("email",$email)->first();
                $student->update([
                    "name" => $request->name,
                    "email" => $request->email
                ]);
            }
        }

        return redirect()->back()->with("success", "Update Successfully");
    }

    public function destroy(string $id)
    {
        $user  = User::findOrFail($id);
        $email = $user->email;
        // Delete from tutor
        if($user->type == "tutor"){
            $tutor = Tutor::where("email",$email)->first();
            $tutor->delete();
        }
        // Delete from students
        if($user->type == "student"){
            $student = Student::where("email",$email)->first();
            $student->delete();
        }
        // Delete from user
        $user->delete();
        return redirect()->back()->with("success", "Deleted Successfully");
    }
}
