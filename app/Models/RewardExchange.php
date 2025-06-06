<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RewardExchange extends Model
{
    protected $fillable = ['user_id', 'reward_id', 'exchanged_at', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reward()
    {
        return $this->belongsTo(Reward::class);
    }
}
