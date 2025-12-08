<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Jika user pertama kali register, redirect ke subscription page
        if (session('first_login')) {
            return view('subscription.index', [
                'user' => $user,
                'show_welcome' => true
            ]);
        }

        return view('subscription.index', [
            'user' => $user,
            'show_welcome' => false
        ]);
    }

    public function choosePlan(Request $request)
    {
        $request->validate([
            'plan' => 'required|in:starter,starter_plus'
        ]);

        $user = Auth::user();

        // Update user role berdasarkan plan yang dipilih
        $user->role = $request->plan === 'starter' ? 'premium_starter' : 'premium_starter_plus';
        $user->save();

        // Hapus session first_login
        session()->forget('first_login');

        return redirect()->route('dashboard')->with([
            'success' => 'Subscription activated successfully!',
            'show_welcome' => true
        ]);
    }
}
