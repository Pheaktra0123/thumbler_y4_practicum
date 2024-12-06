<?php

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
Route::controller(\App\Http\Controllers\AuthController::class)->group(function (){

    Route::get('register','register')->name('register');
    Route::post('register','registerSave')->name('register.save');

    Route::get('login','login')->name('login');
    Route::post('login','loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
Route::get('/admin',function (){
    return view('/Admin/AdminLogin');
});
Route::get('/nav',function (){
    return view('Admin/Dashbard');
});
Route::get('/', function () {
    return view('/Pages/home');
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


