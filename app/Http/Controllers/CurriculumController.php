<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CurriculumController extends Controller
{
    public function index()
    {
        $levels = Level::all();
        return view("admin.curriculum.curriculums",compact("levels"));
    }

    public function store(Request $request)
    {
        // Validation
        $data = $request->validate([
            "level" =>"required|integer|between:1,14",
            "book"  =>"required|file|mimes:pdf,doc,docx,xlsx",
        ]);

        // Storage file
        $data['book'] = Storage::putFile("books",$data['book']);

        Level::create($data);
        return redirect()->back()->with("success","Added Successfully");
    }

    public function show(string $id)
    {
        $level = Level::findOrFail($id);
        return view("admin.curriculum.showCurriculum",compact("level"));
    }

    public function edit(string $id)
    {
        $level = Level::findOrFail($id);
        return view("admin.curriculum.editCurriculum",compact("level"));
    }

    public function update(Request $request, string $id)
    {
        // Validation
        $data = $request->validate([
            "level" =>"required|integer|between:1,14",
            "book"  =>"file|mimes:pdf,doc,docx,xlsx",
        ]);

        // Find book
        $level = Level::findOrFail($id);

        // Storage file
        if($request->has("book")) {
            Storage::delete($level->book);
            $data['book'] = Storage::putFile("books",$data['book']);
        }

        $level->update($data);
        return redirect()->back()->with("success","Added Successfully");
    }

    public function destroy(string $id)
    {
        $level = Level::findOrFail($id);
        Storage::delete($level->book);
        $level->delete();
        return redirect()->back()->with("success","Deleted Successfully");
    }
}
