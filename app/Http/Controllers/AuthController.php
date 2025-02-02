<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function register()
    {
        return view('Pages/register');
    }

    //user Register 
    public function registerSave(Request $request)
    {
        // Validate the input
        $validatedData=$request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        $userExists = User::where('email', $validatedData['email'])
            ->orWhere('username', $validatedData['username'])
            ->exists();
        if ($userExists) {
            return response()->json([
                'message' => 'User already exists with this email or username.'
            ], 400);
        }
        // Create the user
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => "0"
        ]);

        // Redirect or return success
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    //user for view form login
    public function login()
    {
        return view('Pages/login');
    }

    //admin for view form login
    public function LoginAdmin(){
        
        return view('Admin/AdminLogin');
    }

    //validate user and admin
    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();

        if (auth()->user()->type == 'admin') {
            return redirect()->route('Admin/Dashboard');
        } else {
            return redirect()->route('home');
        }

        return redirect()->route('Admin/Dashboard');
    }

    //logout auth
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    public function profile()
    {
        return view('userprofile');
    }

}
