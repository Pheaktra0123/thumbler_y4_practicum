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
    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|in:user,admin', // Validate the type field
        ]);

        $user = User::findOrFail($id); // Find the user by ID
        $user->type = $request->type; // Update the type
        $user->save(); // Save the changes

        return redirect()->back()->with('success', 'User Role Updated Successfully');
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
