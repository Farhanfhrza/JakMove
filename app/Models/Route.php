<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = ['name', 'vehicle_id', 'is_active'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function stops()
    {
        return $this->hasMany(RouteStop::class);
    }

    public function prices()
    {
        return $this->hasMany(RoutePrice::class);
    }
}
