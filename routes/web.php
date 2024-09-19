<?php

use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DemoClassController;
use App\Http\Controllers\FinancialAccountsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\User\pagesController;
use App\Http\Controllers\User\userController;
use App\Models\Level;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;


///// Home
Route::get('/', function () {
    return view('user.home');
})->middleware("guest");
Route::get("home", [HomeController::class, "home"]);


///// Language
Route::get('lang/{lang}', function (string $lang) {
    if ($lang == "ar") {
        session()->put("lang","ar");
    }else{
        session()->put("lang","en");
    }
    return redirect()->back();
});


///// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


///// Dashboard
Route::controller(DashboardController::class)->group(function() {
    // Show dashboard
    Route::get('/dashboard','dashboard')->middleware(['auth', 'verified'])->name('dashboard');

    // Tutor
    // All classes
    Route::get('allClasses','allClasses')->middleware(['auth', 'verified'])->name('allClasses');
    // Add classes
    Route::post("addClass/{email}","store")->middleware(['auth', 'verified'])->name("addClass");

    // Student
    Route::get("viewBook/{id}",function($id) {
        $book = Level::findOrFail($id);
        return view("viewBook",compact("book"));
    })->middleware(['auth', 'verified'])->name("viewBook");

    Route::middleware("isAdmin")->group(function() {
        // All classes
        Route::get("admin/tutorClasses","index")->name("tutorClasses");
        // Show class
        Route::get("admin/classDetails/{id}","show")->name("classDetails");
        // Update class
        Route::put("admin/classUpdate/{id}","update")->name("classUpdate");
        // Delete class
        Route::delete("admin/classDelete/{id}","destroy")->name("classDelete");

        // Search
        Route::get("admin/searchClass","search")->name("searchClass");
    });
});


///// Admins
Route::middleware("isAdmin")->group(function() {
    // Financial Accounts
    Route::controller(FinancialAccountsController::class)->group(function () {
        // All current accounts
        Route::get("admin/currentAccounts", "currentAccounts")->name("currentAccounts");
        // Show current account
        Route::get("admin/showCurrentAccount/{month}", "showCurrentAccount")->name("showCurrentAccount");
        // Edit manager page
        Route::get("admin/editCurrentManager/{id}", "editCurrentManager")->name("editCurrentManager");
        // Update manager account
        Route::put("admin/updateCurrentManagerAccount/{id}", "updateCurrentManagerAccount")->name("updateCurrentManagerAccount");
        // Delete manager account
        Route::delete("admin/deleteCurrentManager/{id}", "deleteCurrentManager")->name("deleteCurrentManager");
        // Edit tutor page
        Route::get("admin/editCurrentTutor/{id}", "editCurrentTutor")->name("editCurrentTutor");
        // Update tutor account
        Route::put("admin/updateCurrentTutorAccount/{id}", "updateCurrentTutorAccount")->name("updateCurrentTutorAccount");
        // Delete tutor account
        Route::delete("admin/deleteCurrentTutor/{id}", "deleteCurrentTutor")->name("deleteCurrentTutor");


        // All old accounts by years
        Route::get("admin/oldAccounts", "oldAccounts")->name("oldAccounts");
        // All old accounts by months
        Route::get("admin/oldAccount/{year}", "oldAccountMonth")->name("oldAccount");
        // Show old account
        Route::get("admin/showOldAccount/{month}", "showOldAccount")->name("showOldAccount");
        // Edit manager page
        Route::get("admin/editManager/{id}", "editManager")->name("editManager");
        // Update manager account
        Route::put("admin/updateManagerAccount/{id}", "updateManagerAccount")->name("updateManagerAccount");
        // Delete manager account
        Route::delete("admin/deleteManager/{id}", "deleteManager")->name("deleteManager");
        // Edit tutor page
        Route::get("admin/editTutor/{id}", "editTutor")->name("editTutor");
        // Update tutor account
        Route::put("admin/updateTutorAccount/{id}", "updateTutorAccount")->name("updateTutorAccount");
        // Delete tutor account
        Route::delete("admin/deleteTutor/{id}", "deleteTutor")->name("deleteTutor");


        // Add financial account
        Route::get("admin/addFinancial", "create")->name("addFinancial");
        // Add Manager financial account
        Route::post("admin/storeFinancialManager", "storeManager")->name("storeFinancialManager");
        // Add Tutor financial account
        Route::post("admin/storeFinancialTutor", "storeTutor")->name("storeFinancialTutor");
    });

    // Demo class
    Route::controller(DemoClassController::class)->group(function() {
        // All classes
        Route::get("demoClasses","index")->name("demoClasses");
        // Edit page
        Route::get("classDetails/{id}","edit")->name("classDetails");
        // Update class
        Route::put("updateClass/{id}","update")->name("updateClass");
        // Change status
        Route::put("changeStatus/{id}","changeStatus")->name("changeStatus");
        // Delete
        Route::delete("deleteClass/{id}","destroy")->name("deleteClass");

    });

    //  Curriculums
    Route::controller(CurriculumController::class)->group(function () {
        // All curriculums
        Route::get("admin/curriculums", "index")->name("curriculums");
        // Show curriculum
        Route::get("admin/showCurriculum/{id}", "show")->name("showCurriculum");
        // Add curriculum
        Route::post("admin/addCurriculum", "store")->name("storeCurriculum");
        // Edit curriculum
        Route::get("admin/editCurriculum/{id}", "edit")->name("editCurriculum");
        // Update curriculum
        Route::put("admin/updateCurriculum/{id}", "update")->name("updateCurriculum");
        // Delete curriculum
        Route::delete("admin/deleteCurriculum/{id}", "destroy")->name("deleteCurriculum");
    });

    // Plans and Pricing
    Route::controller(PlanController::class)->group(function() {
        // All plans
        Route::get("admin/plans","index")->name("plans");
        // Show plan
        Route::get("admin/showPlan/{id}","show")->name("showPlan");
        // Add plan page
        Route::get("admin/addPlan","create")->name("addPlan");
        // Add plan
        Route::Post("admin/storePlan","store")->name("storePlan");
        // Update plan
        Route::put("admin/updatePlan/{id}","update")->name("updatePlan");
        // Delete plan
        Route::delete("admin/deletePlan/{id}","destroy")->name("deletePlan");
    });

    // Users
    Route::controller(ManagerController::class)->group(function () {
        // All managers
        Route::get("admin/managers", "index")->name("managers");
        // Show user
        Route::get("admin/managerDetails/{id}","show")->name("managerDetails");
        // Add manager page
        Route::get("admin/addManager", "create")->name("addManager");
        // Add manager
        Route::post("admin/storeManager", "store")->name("storeManager");
        // Update user
        Route::put("admin/userUpdate/{id}","update")->name("userUpdate");
        // Delete manager
        Route::delete("admin/managerDelete/{id}", "destroy")->name("managerDelete");
    });

    // Tutors
    Route::controller(TutorController::class)->group(function () {
        // All Tutors
        Route::get("admin/tutors", "index")->name("tutors");
        // Show Tutor details
        Route::get("admin/tutorDetails/{id}", "show")->name("tutorDetails");
        // Add tutor page
        Route::get("admin/addTutor", "create")->name("addTutor");
        // Add tutor
        Route::post("admin/storeTutor", "store")->name("storeTutor");
        // Update tutor
        Route::put("admin/tutorUpdate/{id}", "update")->name("tutorUpdate");
        // Delete tutor
        Route::delete("admin/tutorDelete/{id}", "destroy")->name("tutorDelete");
    });

    // Students
    Route::controller(StudentController::class)->group(function () {
        // All students
        Route::get("admin/allStudents", "index")->name("allStudents");
        // Add student page
        Route::get("admin/addStudent", "create")->name("addStudent");
        // Add student
        Route::post("admin/storeStudent", "store")->name("storeStudent");
        // Show student details
        Route::get("admin/studentDetails/{id}", "show")->name("studentDetails");
        // Update Student
        Route::put("admin/studentUpdate/{id}", "update")->name("studentUpdate");
        // Delete student
        Route::delete("admin/studentDelete/{id}", "destroy")->name("studentDelete");
    });
});


///// Users

// User
Route::controller(userController::class)->group(function () {
    // Find tutor
    Route::post("contactUs", "contactUs")->name("contactUs");
    // Become tutor
    Route::post("becomeTutor", "becomeTutor")->name("becomeTutor");
    // tryForFree
    Route::get("tryForFree","tryForFree")->name("tryForFree");
    // Demo class
    Route::post("demoClass","storeDemoClass")->name("demoClass");
    // Payment page
    Route::post("payment/{id}", "payment")->name("payment");
});

// User pages
Route::controller(pagesController::class)->group(function () {
    Route::get('courses', 'courses');
    Route::get('ourTutors', 'ourTutors');
    // Route::get('blog', 'blog');
    // Route::get('pricing','pricing');
    Route::get('tutorType','tutorType');
    Route::get('nativeTutor','nativeTutor');
    Route::get('pricingDetails','pricingDetails');
    Route::get('buyPlan','buyPlan');
    Route::get('showBlog/{id}', 'showBlog');
    Route::get('aboutUs', 'aboutUs');
    Route::get('contact', 'contact');
    Route::get('becomeTutor', 'becomeTutor');
    Route::get('checkout/{id}/{tutorType}', 'checkout');
    Route::get('callback', 'callback');
});

require __DIR__ . '/auth.php';
