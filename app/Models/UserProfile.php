<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id',
        'current_weight',
        'target_weight'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getWeightDifferenceAttribute()
    {
        return $this->current_weight - $this->target_weight;
    }

    public function getProgressPercentageAttribute()
    {
        if ($this->weight_difference <= 0) {
            return 100;
        }
        
        $totalToLose = $this->current_weight - $this->target_weight;
        $lostSoFar = 0; // Ini nanti bisa dihitung dari data history
        
        return ($lostSoFar / $totalToLose) * 100;
    }
}