<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportType extends Model
{
    protected $fillable = ['name', 'price'];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
