<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoutePrice extends Model
{
    protected $fillable = ['route_id', 'origin_stop_id', 'destination_stop_id', 'price'];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function originStop()
    {
        return $this->belongsTo(Stop::class, 'origin_stop_id');
    }

    public function destinationStop()
    {
        return $this->belongsTo(Stop::class, 'destination_stop_id');
    }
}
