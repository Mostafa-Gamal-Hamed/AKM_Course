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

    public function tutorType()
    {
        return view('user.pages.tutorType');
    }

    public function nativeTutor()
    {
        // Fetch all plans
        $natives = Plan::where('type','native')->get();
        return view('user.pages.nativeTutor', compact('natives'));
    }

    public function pricingDetails()
    {
        // Privet
        // Fetch currency
        $ip = request()->ip();
        $location = Location::get("101.46.192.0");
        $country  = $location->countryName;

        // Fetch all plans
        $plans = Plan::where("countryName", $country)->where('type','privet')->get();
        if ($plans->isEmpty()) {
            $plans = Plan::where("countryName", "Other")->get();
        }

        $currency = "USD";
        if ($location->currencyCode == "EGP") {
            $currency = "EGP";
        }
        if ($location->currencyCode == "AED") {
            $currency = "AED";
        }
        if ($location->currencyCode == "SAR") {
            $currency = "SR";
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

        // Groupe
        $groups = Plan::where('type','group')->get();

        // Check if country is egypt
        if ($location->currencyCode == "EGP") {
            $country = "Egypt";
        }else{
            $country = "not";
        }

        return view('user.pages.pricingDetails', compact('plans', 'currency', 'groups', 'country'));
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

    public function checkout($id, $tutorType)
    {
        // Check if tutor or native only
        if (! in_array($tutorType, ['native', 'tutor', 'group'])) {
            return abort(404);
        }

        // Request from native tutor
        if ($tutorType === 'native') {
            $plan = Plan::findOrFail($id);
            $currency = "$";
            return view("user.pages.checkout", compact("plan", "currency"));
        }

        // Request from group
        if ($tutorType === 'group') {
            $plan = Plan::findOrFail($id);
            $currency = "EGP";
            return view("user.pages.checkout", compact("plan", "currency"));
        }

        // Request from pricing details
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
            $currency = "SR";
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
