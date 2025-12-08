<?php

namespace App\Http\Controllers;

use App\Models\UserMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserMenuController extends Controller
{
    // Middleware: hanya premium user yang bisa akses
    public function __construct()
    {
        $this->middleware(['auth', 'premium']);
    }

    // Tampilkan semua menu yang dibuat user
    public function index()
    {
        $user = Auth::user();
        $menus = UserMenu::where('user_id', $user->id)
                        ->latest()
                        ->paginate(10);
        
        return view('user-menus.index', compact('menus', 'user'));
    }

    // Form create menu baru
    public function create()
    {
        return view('user-menus.create');
    }

    // Simpan menu baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'calories' => 'required|integer|min:0|max:5000',
            'description' => 'required|string|max:1000',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'meal_type' => 'required|in:breakfast,lunch,dinner,snack',
            'preparation_time' => 'nullable|integer|min:1|max:480',
            'is_public' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $userMenu = UserMenu::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'calories' => $request->calories,
            'description' => $request->description,
            'ingredients' => $request->ingredients,
            'instructions' => $request->instructions,
            'meal_type' => $request->meal_type,
            'preparation_time' => $request->preparation_time,
            'is_public' => $request->boolean('is_public'),
        ]);

        return redirect()->route('user-menus.show', $userMenu->id)
            ->with('success', 'Menu created successfully!');
    }

    // Tampilkan detail menu
    public function show($id)
    {
        $menu = UserMenu::findOrFail($id);
        
        // Cek apakah user boleh melihat
        if (!$menu->is_public && $menu->user_id != Auth::id()) {
            abort(403, 'This menu is private.');
        }
        
        return view('user-menus.show', compact('menu'));
    }

    // Form edit menu
    public function edit($id)
    {
        $menu = UserMenu::findOrFail($id);
        
        // Cek apakah user adalah pemilik menu
        if ($menu->user_id != Auth::id()) {
            abort(403, 'You can only edit your own menus.');
        }
        
        return view('user-menus.edit', compact('menu'));
    }

    // Update menu
    public function update(Request $request, $id)
    {
        $menu = UserMenu::findOrFail($id);
        
        // Cek apakah user adalah pemilik menu
        if ($menu->user_id != Auth::id()) {
            abort(403, 'You can only edit your own menus.');
        }
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'calories' => 'required|integer|min:0|max:5000',
            'description' => 'required|string|max:1000',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'meal_type' => 'required|in:breakfast,lunch,dinner,snack',
            'preparation_time' => 'nullable|integer|min:1|max:480',
            'is_public' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $menu->update([
            'name' => $request->name,
            'calories' => $request->calories,
            'description' => $request->description,
            'ingredients' => $request->ingredients,
            'instructions' => $request->instructions,
            'meal_type' => $request->meal_type,
            'preparation_time' => $request->preparation_time,
            'is_public' => $request->boolean('is_public'),
        ]);

        return redirect()->route('user-menus.show', $menu->id)
            ->with('success', 'Menu updated successfully!');
    }

    // Hapus menu
    public function destroy($id)
    {
        $menu = UserMenu::findOrFail($id);
        
        // Cek apakah user adalah pemilik menu
        if ($menu->user_id != Auth::id()) {
            abort(403, 'You can only delete your own menus.');
        }
        
        $menu->delete();
        
        return redirect()->route('user-menus.index')
            ->with('success', 'Menu deleted successfully!');
    }

    // Explore menu public dari user lain
    public function explore()
    {
        $publicMenus = UserMenu::where('is_public', true)
                              ->with('user')
                              ->latest()
                              ->paginate(12);
        
        return view('user-menus.explore', compact('publicMenus'));
    }

    // Like/unlike menu
    public function toggleLike($id)
    {
        $menu = UserMenu::findOrFail($id);
        $user = Auth::user();
        
        // Cek apakah menu public
        if (!$menu->is_public) {
            return response()->json(['error' => 'Menu is private'], 403);
        }
        
        // Note: Untuk fitur like butuh tabel pivot user_menu_likes
        // Sementara kita update likes count langsung
        $menu->increment('likes');
        
        return response()->json([
            'liked' => true,
            'likes_count' => $menu->likes
        ]);
    }
}