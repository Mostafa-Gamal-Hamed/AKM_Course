<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\User\countryCode;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

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
        return view('user.pages.pricing');
    }

    public function pricingDetails()
    {
        // Fetch currency
        $ip = request()->ip();
        $location = Location::get("101.46.192.0");
        $country  = $location->countryName;

        // Fetch all plans
        $plans = Plan::where("countryName",$country)->get();
        if($plans->isEmpty()){
            $plans = Plan::where("countryName","Other")->get();
        }

        $currency = "USD";
        if ($location->currencyCode == "EGP") {
            $currency = "EGP";
        }
        if ($location->currencyCode == "AED") {
            $currency = "AED";
        }
        if ($location->currencyCode == "SAR") {
            $currency = "SAR";
        }
        if ($location->currencyCode == "KWD") {
            $currency = "KWD";
        }
        if ($location->currencyCode == "QAR") {
            $currency = "QAR";
        }
        if ($location->currencyCode == "BHD") {
            $currency = "BHD";
        }

        return view('user.pages.pricingDetails', compact('plans', 'currency'));
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
        return view('user.pages.becomeTutor', compact("countryCodes"));
    }

    public function checkout($id)
    {
        // Fetch all plans
        $plan = Plan::findOrFail($id);

        // Fetch currency
        $ip = request()->ip();
        $location = Location::get("101.46.192.0");
        $currency = "USD";
        if ($location->currencyCode == "EGP") {
            $currency = "EGP";
        }
        if ($location->currencyCode == "AED") {
            $currency = "AED";
        }
        if ($location->currencyCode == "SAR") {
            $currency = "SAR";
        }
        if ($location->currencyCode == "KWD") {
            $currency = "KWD";
        }
        if ($location->currencyCode == "QAR") {
            $currency = "QAR";
        }
        if ($location->currencyCode == "BHD") {
            $currency = "BHD";
        }

        return view("user.pages.checkout", compact("plan", "currency"));
    }

    public function buyPlan()
    {
        return view("user.pages.buyPlan");
    }
}
