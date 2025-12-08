<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DietMenuController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Homepage (Dashboard Guest View)
Route::get('/', function () {
    return view('dashboard.guest');
})->name('home');

// Auth Routes (Laravel UI default)
Auth::routes(['verify' => false]);

// Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Subscription Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/subscription', [SubscriptionController::class, 'index'])->name('subscription');
    Route::post('/subscription/choose-plan', [SubscriptionController::class, 'choosePlan'])->name('subscription.choose');
});

// Diet Menu Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/diet-menus/{id}', [DietMenuController::class, 'show'])->name('diet-menus.show');
    Route::get('/premium-menus', [DietMenuController::class, 'premium'])->name('diet-menus.premium');
});

// Premium Features Routes
Route::middleware(['auth', 'premium'])->group(function () {
    Route::get('/daily-planner', function () {
        return view('dashboard.daily-planner');
    })->name('daily-planner');
    
    Route::get('/personalized-menu', function () {
        return view('dashboard.personalized-menu');
    })->name('personalized-menu');
});

// AI Chat Route (only for Starter+)
Route::middleware(['auth', 'premium.starter.plus'])->group(function () {
    Route::get('/ai-chat', function () {
        return view('dashboard.ai-chat');
    })->name('ai-chat');
});

// Fallback route untuk testing
Route::get('/test', function() {
    return 'Test route is working!';
});

// Optional: Clear route cache
Route::get('/clear', function() {
    \Artisan::call('route:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('config:clear');
    return 'Cache cleared!';
});

// User Menu Routes (Premium only)
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