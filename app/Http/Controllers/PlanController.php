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
            "price"=>"required|numeric",
            "month"=>"required|numeric",
            "sessions"=>"required|numeric",
            "type"=>"required|in:online session,offline session"
        ]);
        if($request->get("comment")) {
            $request->validate(["comment"=>"string"]);
        }
        if($request->get("offerPrice")) {
            $request->validate(["offerPrice"=>"numeric"]);
        }

        // Insert data
        Plan::create([
            "name"=>$request->name,
            "comment"=>$request->comment,
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
            "price"=>"required|numeric",
            "month"=>"required|numeric",
            "sessions"=>"required|numeric",
            "type"=>"required|in:online session,offline session"
        ]);
        if($request->get("comment")) {
            $request->validate(["comment"=>"string"]);
        }
        if($request->get("offerPrice")) {
            $request->validate(["offerPrice"=>"numeric"]);
        }

        $plan->update([
            "name"=>$request->name,
            "comment"=>$request->comment,
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
