<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        return view('Pages/home');
    }
    public function dashboard()
    {
        return view('User/user_dashboard');
    }
    public function userEdit(){
        return view('User/Profile_Edit');
    }

    public function adminHome()
    {
        return view('Admin/Dashboard');
    }

}
