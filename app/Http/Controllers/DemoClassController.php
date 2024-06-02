<?php

namespace App\Http\Controllers;

use App\Models\User\DemoClass;
use Illuminate\Http\Request;

class DemoClassController extends Controller
{
    public function index()
    {
        $classes = DemoClass::orderby("id","DESC")->get();
        $num = 1;
        return view("admin.classe.demo.classes",compact("classes","num"));
    }

    public function edit(string $id)
    {
        $class = DemoClass::findOrFail($id);
        return view("admin.classe.demo.details",compact("class"));
    }

    public function update(Request $request, string $id)
    {
        $class = DemoClass::findOrFail($id);
        $request->validate([
            "firstName"=>"required|min:3|string",
            "lastName"=>"required|min:3|string",
            "email"=>"required|email",
            "number"=>"required|numeric|min_digits:9",
            "dateTime"=>"required|date_format:Y-m-d\TH:i",
            "status"=>"required|in:waiting,done"
        ]);

        $class->update([
            "firstName"=>$request->firstName,
            "lastName"=>$request->lastName,
            "email"=>$request->email,
            "number"=>$request->number,
            "dateTime"=>$request->dateTime,
            "status"=>$request->status
        ]);

        return redirect()->route("demoClasses")->with("success","Update successfully");
    }

    public function changeStatus(string $id)
    {
        $class = DemoClass::findOrFail($id);

        if($class->status == "waiting"){
            $class->update(['status'=>'done']);
        }else{
            $class->update(['status'=>'waiting']);
        }

        return redirect()->route("demoClasses")->with("success","Update successfully");
    }

    public function destroy(string $id)
    {
        $class = DemoClass::findOrFail($id);
        $class->delete();
        return redirect()->route("demoClasses")->with("success","Delete successfully");
    }
}
