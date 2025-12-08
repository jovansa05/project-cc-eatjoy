<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'calories',
        'description',
        'ingredients',
        'instructions',
        'category',
        'meal_type',
        'preparation_time',
        'is_public',
        'likes'
    ];

    protected $casts = [
        'is_public' => 'boolean',
        'preparation_time' => 'integer',
        'likes' => 'integer'
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope untuk menu public
    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }

    // Scope untuk menu milik user tertentu
    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    // Accessor untuk preparation time
    public function getPreparationTimeDisplayAttribute()
    {
        if (!$this->preparation_time) return null;
        
        if ($this->preparation_time < 60) {
            return "{$this->preparation_time} min";
        }
        
        $hours = floor($this->preparation_time / 60);
        $minutes = $this->preparation_time % 60;
        
        if ($minutes > 0) {
            return "{$hours}h {$minutes}min";
        }
        
        return "{$hours}h";
    }

    // Accessor untuk meal type dengan icon
    public function getMealTypeIconAttribute()
    {
        $icons = [
            'breakfast' => 'fa-sun',
            'lunch' => 'fa-cloud-sun',
            'dinner' => 'fa-moon',
            'snack' => 'fa-utensils'
        ];
        
        return $icons[$this->meal_type] ?? 'fa-utensils';
    }

    // Method untuk mengecek apakah user bisa edit/hapus
    public function canEdit($userId)
    {
        return $this->user_id == $userId;
    }
}