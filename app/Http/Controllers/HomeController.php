<?php

namespace App\Http\Controllers;

use App\Models\ManagerFinancial;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController extends Controller
{
    public function home()
    {
        if (Auth::user() && Auth::user()->type == "admin") {

            $earnings    = ManagerFinancial::sum('rest');
            $eachManager = round($earnings / 3, 2);
            $expenses    = ManagerFinancial::sum('expenses');
            $tutor       = Tutor::count();

            // Chart
            $options = [
                'chart_title'        => 'Earnings',
                'report_type'        => 'group_by_string',
                'model'              => 'App\Models\ManagerFinancial',
                'group_by_field'     => 'yearMonth',
                'group_by_period'    => 'year',
                'aggregate_function' => 'sum',
                'aggregate_field'    => 'rest',
                'chart_type'         => 'line',
            ];
            $chart = new LaravelChart($options);

            return view("admin.home", compact("earnings", "eachManager", "expenses", "chart", "tutor"));
        } else if (Auth::user()) {
            return view("user.home");
        } else {
            return redirect()->back();
        }
    }
}
