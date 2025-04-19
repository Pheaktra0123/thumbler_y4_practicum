<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;
use App\Models\ModelTumbler;
use App\Models\Tumbler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','Categories','model');
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
            $Categories = Categories::all(); // Paginate categories (6 per page)
            $ModelTumbler = ModelTumbler::all();
            $tumblers = Tumbler::with(['category', 'model'])->paginate(4); // Paginate tumblers (8 per page)
            
            return view('Pages.Home_Category', compact('Categories', 'ModelTumbler', 'tumblers'));
        } catch (\Exception $e) {
            Log::error('Error fetching data: ' . $e->getMessage());
            return view('Pages.Home_Category', [
                'Categories' => collect([]),
                'ModelTumbler' => collect([]),
                'tumblers' => collect([])
            ]);
        }
    }
    public function model()
    {
        $model=ModelTumbler::all();
        return view('Pages.Home_Model_Tumbler',compact('model'));
    }
    // public function tumbler()
    // {
    //     try {
    //         $tumblers = Tumbler::with(['category', 'model'])->get();
    //         $Categories = Categories::all(); // We need both Categories and Tumblers
            
    //         // Add debugging
    //         if ($tumblers->isEmpty()) {
    //             Log::info('No tumblers found in the database');
    //         } else {
    //             Log::info('Tumblers found: ' . $tumblers->count());
    //         }
            
    //         return view('Pages.Home_Category', compact('tumblers', 'Categories'));
    //     } catch (\Exception $e) {
    //         Log::error('Error fetching tumblers: ' . $e->getMessage());
    //         return view('Pages.Home_Category', [
    //             'tumblers' => collect([]),
    //             'Categories' => Categories::all()
    //         ]);
    //     }
    // }

    public function search(Request $request)
    {
        $query = $request->input('query');
        
        $tumblers = Tumbler::with(['category', 'model'])
            ->where('tumbler_name', 'LIKE', "%{$query}%")
            ->orWhereHas('category', function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('model', function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->paginate(8); // Paginate search results (8 per page)

        $Categories = Categories::paginate(6); // Paginate categories (6 per page)
        $ModelTumbler = ModelTumbler::all();
        
        return view('Pages.Home_Category', compact('tumblers', 'Categories', 'ModelTumbler', 'query'));
    }

   

}
