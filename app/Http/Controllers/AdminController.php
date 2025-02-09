<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class  AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages/home');
    }

    public function adminHome()
    {
        return view('dashboard');
    }

    public function Model(){
        return view('CRUD/Model_Crud/View_model');
    }
}
