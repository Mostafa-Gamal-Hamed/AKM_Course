<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::orderby("id","DESC")->get();
        return view("admin.plans.plans",compact("plans"));
    }

    public function show(string $id)
    {
        $plan = Plan::findOrFail($id);
        return view("admin.plans.details",compact("plan"));
    }

    public function create()
    {
        return view("admin.plans.addPlan");
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            "name"=>"required|string|min:3",
            "comment"=>"nullable|string",
            "countryName"=>"nullable|in:Egypt,United Arab Emirates,Saudi Arabia,Kuwait,Qatar,Bahrain,Other",
            "price"=>"required|numeric",
            "offerPrice"=>"nullable|numeric",
            "month"=>"required|numeric",
            "sessions"=>"required|numeric",
            "type"=>"required|in:privet,group,native"
        ]);

        // Insert data
        Plan::create([
            "name"=>$request->name,
            "comment"=>$request->comment,
            "countryName"=>$request->countryName,
            "price"=>$request->price,
            "offerPrice"=>$request->offerPrice,
            "month"=>$request->month,
            "sessions"=>$request->sessions,
            "type"=>$request->type
        ]);

        return redirect()->route("plans")->with("success","Add successfully");
    }

    public function update(Request $request, string $id)
    {
        // Check
        $plan = Plan::findOrFail($id);

        // Validation
        $request->validate([
            "name"=>"required|string|min:3",
            "comment"=>"nullable|string",
            "countryName"=>"nullable|in:Egypt,United Arab Emirates,Saudi Arabia,Kuwait,Qatar,Bahrain,Other",
            "price"=>"required|numeric",
            "offerPrice"=>"nullable|numeric",
            "month"=>"required|numeric",
            "sessions"=>"required|numeric",
            "type"=>"required|in:privet,group,native"
        ]);

        $plan->update([
            "name"=>$request->name,
            "comment"=>$request->comment,
            "countryName"=>$request->countryName,
            "price"=>$request->price,
            "offerPrice"=>$request->offerPrice,
            "month"=>$request->month,
            "sessions"=>$request->sessions,
            "type"=>$request->type
        ]);

        return redirect()->route("plans")->with("success","Updated successfully");
    }

    public function destroy(string $id)
    {
        // Check
        $plan = Plan::findOrFail($id);
        // Delete
        $plan->delete();

        return redirect()->back()->with("success","Deleted successfully");
    }
}
