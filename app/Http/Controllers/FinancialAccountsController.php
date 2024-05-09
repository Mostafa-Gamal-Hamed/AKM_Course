<?php

namespace App\Http\Controllers;

use App\Models\ManagerFinancial;
use App\Models\Tutor;
use App\Models\TutorFinancial;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class FinancialAccountsController extends Controller
{
    ///// Create financial accounts page
    public function create()
    {
        $tutors = Tutor::all();
        return view("admin.financial.addFinancialAccount", compact("tutors"));
    }

    public function storeManager(Request $request)
    {
        $request->validate([
            "yearMonth" => "required|date",
            "week" => "required|integer|between:1,4",
            "yuan" => "required|numeric",
            "currency" => "required|numeric",
            "amount" => "required|numeric",
            "salary" => "required|numeric",
            "rest" => "required|numeric",
            "amr" => "required|numeric",
            "khaled" => "required|numeric",
            "mostafa" => "required|numeric"
        ]);

        ManagerFinancial::create([
            "yearMonth" => $request->yearMonth,
            "week" => $request->week,
            "yuan" => $request->yuan,
            "currency" => $request->currency,
            "amount" => $request->amount,
            "salary" => $request->salary,
            "expenses" => $request->expenses,
            "reason" => $request->reason,
            "rest" => $request->rest,
            "amr" => $request->amr,
            "khaled" => $request->khaled,
            "mostafa" => $request->mostafa
        ]);
        return redirect()->back()->with("success", "Added Successfully");
    }

    public function storeTutor(Request $request)
    {
        $request->validate([
            "tutor" => "required|string|min:3|exists:tutors,name",
            "tutorYearMonth" => "required|date",
            "tutorWeek" => "required|integer|between:1,4",
            "days" => "required|integer|between:1,7",
            "kpis" => "required|numeric",
            "tutorSalary" => "required|numeric",
            "deduction" => "required|numeric",
            "additional" => "required|numeric",
            "total" => "required|numeric"
        ]);

        TutorFinancial::create([
            "name" => $request->tutor,
            "yearMonth" => $request->tutorYearMonth,
            "week" => $request->tutorWeek,
            "days" => $request->days,
            "kpis" => $request->kpis,
            "salary" => $request->tutorSalary,
            "deduction" => $request->deduction,
            "additional" => $request->additional,
            "total" => $request->total
        ]);
        return redirect()->back()->with("success", "Added Successfully");
    }


    ///// Old financial accounts
    public function oldAccounts()
    {
        // Get year
        $currentYear = Carbon::now()->year;
        $lessYear    = $currentYear - 1;
        $startYear   = 2023;

        for ($i = $lessYear; $i >= $startYear; $i--) {
            $records = ManagerFinancial::whereYear('yearMonth', $i)->get();
            $yearsData[$i] = $records;
        }
        return view("admin.financial.oldAccounts", compact("yearsData"));
    }

    public function oldAccountMonth($year)
    {
        return view("admin.financial.oldAccounts.oldAccountMonth", compact("year"));
    }

    public function showOldAccount($yearMonth)
    {
        // Get year and month
        list($year, $month) = explode('-', $yearMonth);

        // Check Year and month
        $currentYear = Carbon::now()->year;
        if ($year >= $currentYear || $year < 2023) {
            abort(404);
        }
        if ($month > 12 || $month <= 0) {
            abort(404);
        }

        // Manager
        $manager1 = ManagerFinancial::whereYear("yearMonth", $year)->whereMonth("yearMonth", $month)->where("week", "1")->get();
        $manager2 = ManagerFinancial::whereYear("yearMonth", $year)->whereMonth("yearMonth", $month)->where("week", "2")->get();
        $manager3 = ManagerFinancial::whereYear("yearMonth", $year)->whereMonth("yearMonth", $month)->where("week", "3")->get();
        $manager4 = ManagerFinancial::whereYear("yearMonth", $year)->whereMonth("yearMonth", $month)->where("week", "4")->get();
        // Tutors
        $tutor1 = TutorFinancial::whereYear("yearMonth", $year)->whereMonth("yearMonth", $month)->where("week", "1")->get();
        $tutor2 = TutorFinancial::whereYear("yearMonth", $year)->whereMonth("yearMonth", $month)->where("week", "2")->get();
        $tutor3 = TutorFinancial::whereYear("yearMonth", $year)->whereMonth("yearMonth", $month)->where("week", "3")->get();
        $tutor4 = TutorFinancial::whereYear("yearMonth", $year)->whereMonth("yearMonth", $month)->where("week", "4")->get();

        return view("admin.financial.oldAccounts.showOldAccount", compact("month", "manager1", "manager2", "manager3", "manager4", "tutor1", "tutor2", "tutor3", "tutor4"));
    }

    public function editManager(string $id)
    {
        // Check if exist
        $manager = ManagerFinancial::findOrFail($id);
        return view("admin.financial.oldAccounts.editManager", compact("manager"));
    }

    public function updateManagerAccount(Request $request, string $id)
    {
        // Validation
        $request->validate([
            "yearMonth" => "required|date",
            "week" => "required|integer|between:1,4",
            "yuan" => "required|numeric",
            "currency" => "required|numeric",
            "amount" => "required|numeric",
            "salary" => "required|numeric",
            "rest" => "required|numeric",
            "amr" => "required|numeric",
            "khaled" => "required|numeric",
            "mostafa" => "required|numeric"
        ]);

        // Check if exist
        $account = ManagerFinancial::findOrFail($id);

        // Update
        $account->update([
            "yearMonth" => $request->yearMonth,
            "week" => $request->week,
            "yuan" => $request->yuan,
            "currency" => $request->currency,
            "amount" => $request->amount,
            "salary" => $request->salary,
            "expenses" => $request->expenses,
            "reason" => $request->reason,
            "rest" => $request->rest,
            "amr" => $request->amr,
            "khaled" => $request->khaled,
            "mostafa" => $request->mostafa
        ]);

        // Get year and month only
        list($year, $month) = explode("-", $request->yearMonth);
        return redirect()->route("showOldAccount", "$year-$month")->with("success", "Updated successfully");
    }


    public function deleteManager(string $id)
    {
        // Check if exist
        $manager = ManagerFinancial::findOrFail($id);
        $manager->delete();
        return redirect()->back()->with("success", "Deleted Successfully");
    }

    public function editTutor(string $id)
    {
        // Check if exist
        $tutor = TutorFinancial::findOrFail($id);
        return view("admin.financial.oldAccounts.editTutor", compact("tutor"));
    }

    public function updateTutorAccount(Request $request, string $id)
    {
        // Validation
        $request->validate([
            "tutor"          => "required|string|min:3|exists:tutors,name",
            "tutorYearMonth" => "required|date",
            "tutorWeek"      => "required|integer|between:1,4",
            "days"           => "required|integer|between:1,7",
            "kpis"           => "required|numeric",
            "tutorSalary"    => "required|numeric",
            "deduction"      => "required|numeric",
            "additional"     => "required|numeric",
            "total"          => "required|numeric"
        ]);

        // Check if exist
        $account = TutorFinancial::findOrFail($id);

        // Update
        $account->update([
            "name"       => $request->tutor,
            "yearMonth"  => $request->tutorYearMonth,
            "week"       => $request->tutorWeek,
            "days"       => $request->days,
            "kpis"       => $request->kpis,
            "salary"     => $request->tutorSalary,
            "deduction"  => $request->deduction,
            "additional" => $request->additional,
            "total"      => $request->total
        ]);

        // Get year and month only
        list($year, $month) = explode("-", $request->tutorYearMonth);
        return redirect()->route("showOldAccount", "$year-$month")->with("success", "Updated successfully");
    }

    public function deleteTutor(string $id)
    {
        $tutor = TutorFinancial::findOrFail($id);
        $tutor->delete();
        return redirect()->back()->with("success", "Deleted Successfully");
    }


    ///// Current financial accounts
    public function currentAccounts()
    {
        // Get date
        $date = Carbon::now();
        $currentYear = $date->toDateString();
        list($year, $month) = explode("-", $currentYear);

        return view("admin.financial.currentAccounts", compact("year", "month"));
    }

    public function showCurrentAccount($yearMonth)
    {
        // Get year and month
        list($year, $month) = explode('-', $yearMonth);

        // Check Year and month
        $currentYear = Carbon::now()->year;
        if ($year != $currentYear) {
            abort(404);
        }
        if ($month > 12 || $month <= 0) {
            abort(404);
        }

        // Manager
        $manager1 = ManagerFinancial::whereYear("yearMonth", $year)->whereMonth("yearMonth", $month)->where("week", "1")->get();
        $manager2 = ManagerFinancial::whereYear("yearMonth", $year)->whereMonth("yearMonth", $month)->where("week", "2")->get();
        $manager3 = ManagerFinancial::whereYear("yearMonth", $year)->whereMonth("yearMonth", $month)->where("week", "3")->get();
        $manager4 = ManagerFinancial::whereYear("yearMonth", $year)->whereMonth("yearMonth", $month)->where("week", "4")->get();
        // Tutors
        $tutor1 = TutorFinancial::whereYear("yearMonth", $year)->whereMonth("yearMonth", $month)->where("week", "1")->get();
        $tutor2 = TutorFinancial::whereYear("yearMonth", $year)->whereMonth("yearMonth", $month)->where("week", "2")->get();
        $tutor3 = TutorFinancial::whereYear("yearMonth", $year)->whereMonth("yearMonth", $month)->where("week", "3")->get();
        $tutor4 = TutorFinancial::whereYear("yearMonth", $year)->whereMonth("yearMonth", $month)->where("week", "4")->get();

        return view("admin.financial.currentAccounts.showCurrentAccount", compact("month", "manager1", "manager2", "manager3", "manager4", "tutor1", "tutor2", "tutor3", "tutor4"));
    }

    public function editCurrentManager(string $id)
    {
        // Check if exist
        $manager = ManagerFinancial::findOrFail($id);
        return view("admin.financial.currentAccounts.editManager", compact("manager"));
    }

    public function updateCurrentManagerAccount(Request $request, string $id)
    {
        // Validation
        $request->validate([
            "yearMonth" => "required|date",
            "week" => "required|integer|between:1,4",
            "yuan" => "required|numeric",
            "currency" => "required|numeric",
            "amount" => "required|numeric",
            "salary" => "required|numeric",
            "rest" => "required|numeric",
            "amr" => "required|numeric",
            "khaled" => "required|numeric",
            "mostafa" => "required|numeric"
        ]);

        // Check if exist
        $account = ManagerFinancial::findOrFail($id);

        // Update
        $account->update([
            "yearMonth" => $request->yearMonth,
            "week" => $request->week,
            "yuan" => $request->yuan,
            "currency" => $request->currency,
            "amount" => $request->amount,
            "salary" => $request->salary,
            "expenses" => $request->expenses,
            "reason" => $request->reason,
            "rest" => $request->rest,
            "amr" => $request->amr,
            "khaled" => $request->khaled,
            "mostafa" => $request->mostafa
        ]);

        // Get year and month only
        list($year, $month) = explode("-", $request->yearMonth);
        return redirect()->route("showCurrentAccount", "$year-$month")->with("success", "Updated successfully");
    }


    public function deleteCurrentManager(string $id)
    {
        // Check if exist
        $manager = ManagerFinancial::findOrFail($id);
        $manager->delete();
        return redirect()->back()->with("success", "Deleted Successfully");
    }

    public function editCurrentTutor(string $id)
    {
        // Check if exist
        $tutor = TutorFinancial::findOrFail($id);
        return view("admin.financial.currentAccounts.editTutor", compact("tutor"));
    }

    public function updateCurrentTutorAccount(Request $request, string $id)
    {
        // Validation
        $request->validate([
            "tutor"          => "required|string|min:3|exists:tutors,name",
            "tutorYearMonth" => "required|date",
            "tutorWeek"      => "required|integer|between:1,4",
            "days"           => "required|integer|between:1,7",
            "kpis"           => "required|numeric",
            "tutorSalary"    => "required|numeric",
            "deduction"      => "required|numeric",
            "additional"     => "required|numeric",
            "total"          => "required|numeric"
        ]);

        // Check if exist
        $account = TutorFinancial::findOrFail($id);

        // Update
        $account->update([
            "name"       => $request->tutor,
            "yearMonth"  => $request->tutorYearMonth,
            "week"       => $request->tutorWeek,
            "days"       => $request->days,
            "kpis"       => $request->kpis,
            "salary"     => $request->tutorSalary,
            "deduction"  => $request->deduction,
            "additional" => $request->additional,
            "total"      => $request->total
        ]);

        // Get year and month only
        list($year, $month) = explode("-", $request->tutorYearMonth);
        return redirect()->route("showCurrentAccount", "$year-$month")->with("success", "Updated successfully");
    }

    public function deleteCurrentTutor(string $id)
    {
        $tutor = TutorFinancial::findOrFail($id);
        $tutor->delete();
        return redirect()->back()->with("success", "Deleted Successfully");
    }
}
