<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $fillable = ['name', 'price', 'description'];

    public function rewardExchanges()
    {
        return $this->hasMany(RewardExchange::class);
    }
}
