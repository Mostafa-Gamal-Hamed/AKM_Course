<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\User\countryCode;
use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function courses()
    {
        return view('user.pages.courses');
    }
    public function ourTutors()
    {
        return view('user.pages.ourTutors');
    }

    public function pricing()
    {
        $plans = Plan::all();
        return view('user.pages.pricing',compact('plans'));
    }

    public function blog()
    {
        return view('user.pages.blog');
    }

    public function showBlog($id)
    {
        return view('user.pages.showBlog');
    }

    public function aboutUs()
    {
        return view('user.pages.aboutUs');
    }

    public function contact()
    {
        return view('user.pages.contact');
    }

    public function becomeTutor()
    {
        $countryCodes = countryCode::all();
        return view('user.pages.becomeTutor',compact("countryCodes"));
    }

    public function checkout($id)
    {
        $plan = Plan::findOrFail($id);
        return view("user.pages.checkout",compact("plan"));
    }
}
