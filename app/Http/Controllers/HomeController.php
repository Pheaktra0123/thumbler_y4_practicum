<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        $Categories = Categories::all();
        return view('Pages.Home_Category', compact('Categories'));
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
        $users=User::all();
        return view('Admin/Dashboard',compact('users'));
    }
    public function Categories(){
        $Categories=Categories::all();
        return view('Pages.Home_Category',compact('Categories'));
    }

}
