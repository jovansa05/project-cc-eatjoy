<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'calories',
        'description',
        'ingredients',
        'instructions',
        'image',
        'is_premium'
    ];

    protected $casts = [
        'is_premium' => 'boolean',
        'calories' => 'integer'
    ];

    // Scope untuk menu free
    public function scopeFree($query)
    {
        return $query->where('is_premium', false);
    }

    // Scope untuk menu premium
    public function scopePremium($query)
    {
        return $query->where('is_premium', true);
    }

    // Accessor untuk display calories
    public function getCaloriesDisplayAttribute()
    {
        return "{$this->calories} cal";
    }

    // Accessor untuk type
    public function getTypeAttribute()
    {
        return $this->is_premium ? 'Premium' : 'Free';
    }
}