<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
    protected $fillable = ['name', 'location', 'description'];

    public function routeStops()
    {
        return $this->hasMany(RouteStop::class);
    }
}
