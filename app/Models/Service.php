<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'booking_id',
        'service_date',
        'status',
        'description',
        'price',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
