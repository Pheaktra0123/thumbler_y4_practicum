<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;

class  AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function customer(){
        $users=User::where('type','user')->get();
        return view('Admin/Auth',compact('users'));
    }
    public function editRole($id){
        $users=User::find($id);
        return view('Admin/Auth',compact('users'));
    }
    public function updateRole(Request $request, User $user)
{
    $validated = $request->validate([
        'type' => 'required|integer|in:0,1',
    ]);

    $user->update($validated);

    return back()->with('success', 'User role updated successfully');
}
    public function deleteRole($id){
        $users=User::find($id);
        $users->delete();
        return redirect()->back()->with('success','User Deleted Successfully');
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
