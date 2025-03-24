<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;
use App\Models\ModelTumbler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
       
        return view('Pages.home');
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
    public function Categories()
    {
        try {
            $Categories = Categories::all();
            
            // Add this for debugging
            if ($Categories->isEmpty()) {
                \Log::info('No categories found in the database');
            } else {
                \Log::info('Categories found: ' . $Categories->count());
            }
            
            return view('Pages.Home_Category', compact('Categories'));
        } catch (\Exception $e) {
            \Log::error('Error fetching categories: ' . $e->getMessage());
            return view('Pages.Home_Category', ['Categories' => collect([])]);
        }
    }
    public function model()
    {
        $model=ModelTumbler::all();
        return view('Pages.Home_Model_Tumbler',compact('model'));
    }

}
