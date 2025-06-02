<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RouteStop extends Model
{
    protected $fillable = ['stop_id', 'route_id', 'stop_order', 'estimated_time'];

    public function stop()
    {
        return $this->belongsTo(Stop::class);
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}
