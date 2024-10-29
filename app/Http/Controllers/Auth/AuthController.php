<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    // Show the registration form
public function showRegistrationForm()
{
    return view('auth.register'); // Make sure you have this view
}

// Show the login form
public function showLoginForm()
{
    return view('auth.login'); // Make sure you have this view
}



    // Handle user registration
public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:4|confirmed',
      
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'usertype' => 'user', 
    ]);

    Auth::login($user);

    return redirect()->route('login')->with('success', 'Registration successful!');
}


public function login(Request $request)
{
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // Check the user type and redirect accordingly
        if ($user->usertype === 'admin') {
            return redirect()->route('dashboard'); // Admin route
        }

        return redirect()->route('index'); // User route
    }

    return redirect()->back()->with('error', 'Invalid credentials.');
}

public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
}


}
