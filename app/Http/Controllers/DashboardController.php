<?php

namespace App\Http\Controllers;

use App\Models\DietMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Jika guest, redirect ke home
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        $user = Auth::user();
        $profile = $user->profile;

        // Ambil 25 menu diet (8 untuk guest view)
        $menus = DietMenu::where('is_premium', false)
                        ->limit(25)
                        ->get();

        // Data untuk pop-up setelah login
        $weightDifference = $profile ? $profile->current_weight - $profile->target_weight : 0;
        $motivationalQuotes = $this->getMotivationalQuote($weightDifference);

        return view('dashboard.user', compact('user', 'menus', 'motivationalQuotes', 'profile'));
    }

    private function getMotivationalQuote($weightDifference)
    {
        if ($weightDifference > 10) {
            return [
                'title' => 'Perjalanan Dimulai!',
                'message' => 'Setiap perjalanan besar dimulai dengan langkah kecil. Kamu sudah mengambil langkah pertama!',
                'icon' => '🚀'
            ];
        } elseif ($weightDifference > 5) {
            return [
                'title' => 'Target Dekat!',
                'message' => 'Targetmu sudah di depan mata! Konsistensi adalah kunci kesuksesan.',
                'icon' => '🎯'
            ];
        } else {
            return [
                'title' => 'Hampir Sampai!',
                'message' => 'Sedikit lagi! Kamu sudah melewati sebagian besar perjalanan.',
                'icon' => '🌟'
            ];
        }
    }
}
