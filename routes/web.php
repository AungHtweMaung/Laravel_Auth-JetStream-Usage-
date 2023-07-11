<?php

use App\Http\Controllers\User\CustomerController;
use App\Http\Middleware\AungHtwe;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// auth:sanctum သည် login ဝင်ထားလား ၊ မဝင်ထားဘူးလားဆိုတာ စစ်တာ။
// login ဝင်ထားမှ dashboard သွားလို့ရမယ်။ မဝင်ထားရင် login ဝင်ခိုင်းမယ်။
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view("customer.home");
    })->name('dashboard');


    Route::group(["prefix" => "customer", "middleware" => ["codelab_middleware"]], function () {
        Route::get("home", [CustomerController::class, "home"])->name('home');
        Route::get("about", [CustomerController::class, "about"])->name('about');
        Route::get("contact", [CustomerController::class, "contact"])->name('contact');
    });

    Route::get("userPage", function() {
        return "UserPage";
    })->name("userPage");


});


Route::middleware(["codelab_middleware"])->group(function() {

    Route::get("one", function () {
        return "one";
    });

    Route::get("two", function () {
        return "two";
    });
    Route::get("three", function () {
        return "three";
    });
});


// Route::get("customer/home", [CustomerController::class, "home"]);
// Route::get("customer/about", [CustomerController::class, "about"]);
// Route::get("customer/contact", [CustomerController::class, "contact"]);


// Route::prefix("customer")->group(function() {
//     Route::get("home", [CustomerController::class, "home"]);
//     Route::get("about", [CustomerController::class, "about"]);
//     Route::get("contact", [CustomerController::class, "contact"]);

// });


Route::group(["prefix" => "customer", "middleware" => ["codelab_middleware"]], function() {
    Route::get("customer/home", [CustomerController::class, "home"]);
    Route::get("customer/about", [CustomerController::class, "about"]);
    Route::get("customer/contact", [CustomerController::class, "contact"]);
});
