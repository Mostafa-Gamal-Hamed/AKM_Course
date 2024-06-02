<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Tutor;
use App\Models\TutorClasses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    // Tutor side
    public function dashboard()
    {
        $user = Auth::user();
        $student = Student::where("email",$user->email)->first();
        return view('dashboard', compact('user','student'));
    }

    public function store(Request $request, string $email)
    {
        // Validation
        $request->validate([
            "week" => "required|numeric|in:1,2,3,4",
            "reserved" => "required|numeric",
            "absent" => "required|numeric",
            "conducted" => "required|numeric"
        ]);

        // Check if exist
        $tutor = Tutor::where("email", $email)->first();

        // Insert data
        TutorClasses::create([
            "week" => $request->week,
            "reserved" => $request->reserved,
            "absent" => $request->absent,
            "conducted" => $request->conducted,
            "tutors_name" => $tutor->name
        ]);

        return redirect()->back()->with("success", "Successfully");
    }

    public function allClasses()
    {
        $name    = Auth::user()->name;
        $classes = TutorClasses::where("tutors_name",$name)->orderBy("created_at", "desc")->get();
        $count   = count($classes);
        $num     = 1;
        return view("allClasses", compact("classes", "count", "num"));
    }

    // Admin side
    public function index()
    {
        $classes = TutorClasses::orderBy("created_at", "desc")->get();
        $count   = count($classes);
        $num     = 1;
        return view("admin.tutor.classes.classes", compact("classes", "count", "num"));
    }

    public function show(string $id)
    {
        $class = TutorClasses::findOrFail($id);
        return view("admin.tutor.classes.details", compact("class"));
    }

    public function update(Request $request, string $id)
    {
        // Find class
        $class = TutorClasses::findOrFail($id);

        // Validation
        $request->validate([
            "week" => "required|numeric|in:1,2,3,4",
            "reserved" => "required|numeric",
            "absent" => "required|numeric",
            "conducted" => "required|numeric"
        ]);

        // Insert data
        $class->update([
            "week"      => $request->week,
            "reserved"  => $request->reserved,
            "absent"    => $request->absent,
            "conducted" => $request->conducted
        ]);

        return redirect()->route("tutorClasses")->with("success", "Update Successfully");
    }

    public function destroy(string $id)
    {
        $class = TutorClasses::findOrFail($id);
        $class->delete();
        return redirect()->back()->with("success", "Deleted Successfully");
    }


    public function search(Request $request)
    {
        // validation
        $request->validate([
            "searchName" => "required|string"
        ]);

        // Find by name
        $classes = TutorClasses::where("tutors_name", "LIKE", "%$request->searchName%")->orderBy("created_at", "desc")->get();

        // Check if empty
        if ($classes->isEmpty()) {
            return redirect()->back()->with("error", "Not Found");
        }

        $count   = count($classes);
        $num     = 1;
        return view("admin.tutor.classes.classes", compact("classes", "count", "num"));
    }
}
