<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthManager extends Controller
{
    // Display the login form
    function login()
    {
        return view('auth.login');
    }

    // Log out the authenticated user
    function logout(){
        Auth::logout();
        return redirect(route("login")); // Redirect to the login page
    }

    function loginPost(Request $request)
    {
        // Validate the request data (email and password are required)
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        // If authentication is successful, redirect to the intended page (e.g., home)
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route("home"));
        }

        return back()->withErrors([
            'email' => 'Invalid login credentials',
        ])->withInput();
    }

    // Display the registration form
    function register()
    {
        return view('auth.register');
    }

    function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Create a new User instance
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        
        // Save the user to the database
        if($user->save()){
            return redirect(route("login"))->with("success", "registration Successfull");
        }
        return redirect(route("register"))->with("Error", "Registraion Failed");
    }
}
