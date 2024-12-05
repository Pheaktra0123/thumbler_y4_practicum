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
    public function  __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function register()
    {
        return view('Pages/register');
    }
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
        ]);

        // Redirect or return success
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }
    public function login()
    {
        return view('Pages/login');
    }
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
            return redirect()->route('admin/home');
        } else {
            return redirect()->route('Pages/home');
        }

        return redirect()->route('dashboard');
    }

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
