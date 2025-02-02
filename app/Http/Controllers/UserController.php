<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   // Method to show the edit form
   public function edit()
   {
       $user = Auth::user();
       return view('User/user_dashboard', compact('user'));
   }

   // Method to handle the form submission and update the user's information
   public function update(Request $request)
   {
       $user = Auth::user();

       // Validate the input
       $validatedData = $request->validate([
           'username' => 'required|string|max:255|unique:users,username,' . $user->id,
           'phone' => 'nullable|string|max:255',
           'address' => 'nullable|string|max:255',
           'about' => 'nullable|string|max:500',
           'user-photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

       // Update the user's information
       $user->username = $validatedData['username'];
       $user->phone = $validatedData['phone'];
       $user->address = $validatedData['address'];
       $user->description = $validatedData['about'];

       // Handle the user photo upload
       if ($request->hasFile('user-photo')) {
           $image = $request->file('user-photo');
           $imageName = time() . '.' . $image->getClientOriginalExtension();
           $image->move(public_path('images'), $imageName);
           $user->thumbnail = 'images/' . $imageName;
       }

       $user->save();

       // Redirect back with a success message
       return redirect()->route('user.profile')->with('message', 'Profile updated successfully!');

   }
}
