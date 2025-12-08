<?php

namespace App\Http\Controllers;

use App\Models\DietMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DietMenuController extends Controller
{
    public function show($id)
    {
        $menu = DietMenu::findOrFail($id);
        $user = Auth::user();

        // Jika guest atau user biasa, hanya beri info terbatas
        if (!$user || (!$user->isPremium() && $menu->is_premium)) {
            return response()->json([
                'id' => $menu->id,
                'name' => $menu->name,
                'calories' => $menu->calories,
                'description' => $user ? 'Silakan berlangganan untuk melihat detail lengkap' : 'Silakan login untuk melihat detail lengkap',
                'ingredients' => null,
                'instructions' => null,
                'is_premium' => $menu->is_premium,
                'requires_login' => !$user,
                'requires_premium' => $menu->is_premium && !$user->isPremium(),
            ]);
        }

        return response()->json([
            'id' => $menu->id,
            'name' => $menu->name,
            'calories' => $menu->calories,
            'description' => $menu->description,
            'ingredients' => $menu->ingredients,
            'instructions' => $menu->instructions,
            'is_premium' => $menu->is_premium,
            'requires_login' => false,
            'requires_premium' => false,
        ]);
    }

    public function premium()
    {
        $menus = DietMenu::where('is_premium', true)->get();
        $user = Auth::user();

        return view('diet-menus.premium', compact('menus', 'user'));
    }
}
