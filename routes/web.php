<?php

use App\Http\Controllers\AuthController;
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

//route for auth controller (login and sign up admin and user)
Route::controller(\App\Http\Controllers\AuthController::class)->group(function (){
    Route::controller(AuthController::class)->group(function () {
        // for register
        Route::get('register', 'register')->name('register');
        Route::post('register', 'registerSave')->name('register.save');
        // for login
        Route::get('login', 'login')->name('login');
        Route::post('login', 'loginAction')->name('login.action');
        // for logout
        Route::get('logout', 'logout')->middleware('auth')->name('logout');
    });
});

// route for home page 
Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('home');

//route for normal user
Route::middleware(['auth','user-access:user'])->group(function (){

});

//route for admin
Route::middleware(['auth','user-access:admin'])->group(function (){

});


//test route
Route::get("/Tumblers",function (){
   return view("/Admin/Product");
});
Route::get('/nav',function (){
    return view('Admin/Dashbard');
});
Route::get('/customize', function () {
    return view('/Pages/customize');
});
Route::get('/customizedetails', function () {
    return view('/Pages/customizedetails');
});
Route::get('/#about-us', function () {
    return view('/Pages/home/#about-us');
});
Route::get('/Categories_home',function(){
    return view('/Pages/Home_Category');
});
Route::get('/Model_home',function(){
    return view('/Pages/Home_Model_Tumbler');
});
Route::get('/Trending_home',function(){
    return view('/Pages/Home_Trending_Tumbler');
});