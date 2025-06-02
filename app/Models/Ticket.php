<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'user_id',
        'transport_type_id',
        'pickup_stop_id',
        'dropoff_stop_id',
        'travel_date',
        'used_at',
        'status',
        'price',
        'booked_at'
    ];

    protected $dates = ['travel_date', 'used_at', 'booked_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function transportType() {
        return $this->belongsTo(TransportType::class);
    }

    public function pickupStop() {
        return $this->belongsTo(Stop::class, 'pickup_stop_id');
    }

    public function dropoffStop() {
        return $this->belongsTo(Stop::class, 'dropoff_stop_id');
    }
}
