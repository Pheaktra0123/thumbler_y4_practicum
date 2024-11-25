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

Route::get('/login', function () {
    return view('/Pages/Login');
});
Route::get('/signup',function (){
    return view('Pages/Register');
});
<<<<<<< HEAD
Route::get('/home', function () {
=======
Route::get('/', function () {
>>>>>>> 96378c107bce39749ddc922c392ea62e8f3d11d8
    return view('/Pages/home');
});
