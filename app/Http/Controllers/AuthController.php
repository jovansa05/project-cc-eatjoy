<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        // Validation
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to login with username
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ], $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        // If failed, try with email (optional)
        if (Auth::attempt([
            'email' => $request->username,
            'password' => $request->password
        ], $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        // Return error
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput($request->only('username', 'remember'));
    }

    /**
     * Show registration form
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Handle registration request
     */
    public function register(Request $request)
    {
        // Validation
        $request->validate([
            'nickname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'current_weight' => 'required|numeric|min:30|max:200',
            'target_weight' => 'required|numeric|min:30|max:200',
            'terms' => 'required',
        ]);

        // Create user
        $user = User::create([
            'name' => $request->nickname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'current_weight' => $request->current_weight,
            'target_weight' => $request->target_weight,
            'subscription_type' => 'free',
            'subscription_expires_at' => null,
        ]);

        // Auto login
        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Registration successful! Welcome to EatJoy.');
    }

    /**
     * Handle logout request
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}