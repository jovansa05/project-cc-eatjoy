<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DietMenuController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserMenuController;
use App\Http\Controllers\DailyPlannerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', function () {
    return view('dashboard.guest');
})->name('home');

// AUTH ROUTES
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// PROTECTED ROUTES
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // **DAILY PLANNER ROUTES - PASTI BERHASIL**
    Route::get('/daily-planner', [DailyPlannerController::class, 'index'])->name('daily-planner');
    Route::get('/daily-planner/generate', [DailyPlannerController::class, 'generate'])->name('daily-planner.generate');
    
    // Subscription
    Route::get('/subscription', [SubscriptionController::class, 'index'])->name('subscription');
    Route::post('/subscription/choose-plan', [SubscriptionController::class, 'choosePlan'])->name('subscription.choose');
    
    // Diet Menus
    Route::get('/diet-menus/{id}', [DietMenuController::class, 'show'])->name('diet-menus.show');
    Route::get('/premium-menus', [DietMenuController::class, 'premium'])->name('diet-menus.premium');
});

// ... lainnya tetap ...

// ==================== PREMIUM ROUTES ====================
Route::middleware(['auth', 'premium'])->group(function () {
    // Daily Planner sudah dipindah ke atas (available untuk semua user auth)
    // Route::get('/daily-planner', [DailyPlannerController::class, 'index'])->name('daily-planner');
    
    Route::get('/personalized-menu', function () {
        return view('dashboard.personalized-menu');
    })->name('personalized-menu');
});

// AI Chat (Starter+)
Route::middleware(['auth', 'premium.starter.plus'])->group(function () {
    Route::get('/ai-chat', function () {
        return view('dashboard.ai-chat');
    })->name('ai-chat');
});

// User Menus (Premium)
Route::middleware(['auth', 'premium'])->prefix('user-menus')->group(function () {
    Route::get('/', [UserMenuController::class, 'index'])->name('user-menus.index');
    Route::get('/create', [UserMenuController::class, 'create'])->name('user-menus.create');
    Route::post('/', [UserMenuController::class, 'store'])->name('user-menus.store');
    Route::get('/explore', [UserMenuController::class, 'explore'])->name('user-menus.explore');
    Route::get('/{id}', [UserMenuController::class, 'show'])->name('user-menus.show');
    Route::get('/{id}/edit', [UserMenuController::class, 'edit'])->name('user-menus.edit');
    Route::put('/{id}', [UserMenuController::class, 'update'])->name('user-menus.update');
    Route::delete('/{id}', [UserMenuController::class, 'destroy'])->name('user-menus.destroy');
    Route::post('/{id}/toggle-like', [UserMenuController::class, 'toggleLike'])->name('user-menus.toggle-like');
});

// ==================== TEST ROUTES ====================
Route::get('/test', function() {
    return response()->json([
        'status' => 'success',
        'message' => 'Server is running!',
        'timestamp' => now(),
        'routes' => [
            'login' => route('login'),
            'register' => route('register'),
            'home' => route('home'),
            'dashboard' => route('dashboard'),
            'daily-planner' => route('daily-planner'),
        ]
    ]);
});

Route::get('/clear-cache', function() {
    if (app()->environment('local')) {
        \Artisan::call('route:clear');
        \Artisan::call('cache:clear');
        \Artisan::call('config:clear');
        \Artisan::call('view:clear');
        return 'All caches cleared!';
    }
    return 'Development only';
});