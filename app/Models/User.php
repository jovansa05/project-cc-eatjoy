<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username',
        'nickname',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }

    public function isPremium()
    {
        return in_array($this->role, ['premium_starter', 'premium_starter_plus']);
    }

    public function isPremiumStarterPlus()
    {
        return $this->role === 'premium_starter_plus';
    }

    public function getPlanName()
    {
        $plans = [
            'user' => 'Free User',
            'premium_starter' => 'EatJoy Starter',
            'premium_starter_plus' => 'EatJoy Starter+'
        ];
        
        return $plans[$this->role] ?? 'Free User';
    }

    // Helper untuk cek apakah user punya subscription aktif
    public function hasActiveSubscription()
    {
        if (!$this->subscription) {
            return false;
        }
        
        return $this->subscription->isActive();
    }
}