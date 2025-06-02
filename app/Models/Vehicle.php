<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['name', 'plate_number', 'transport_type_id'];

    public function transportType()
    {
        return $this->belongsTo(TransportType::class);
    }

    public function routes()
    {
        return $this->hasMany(Route::class);
    }
}
