<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function username()
    {
        return 'username'; // Ubah dari email ke username
    }

    protected function authenticated(Request $request, $user)
    {
        // Cek apakah ini login pertama kali setelah register
        // Perbaikan: gunakan role bukan subscription untuk cek first login
        if ($user->role === 'user' && !$user->isPremium()) {
            session(['first_login' => true]);
            return redirect()->route('subscription');
        }

        // Set session untuk show welcome message
        session()->flash('show_welcome', true);

        return redirect()->intended($this->redirectPath());
    }
}