<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'booking_date',
        'vehicle_number',
        'service_type',
        'status', // Add status field
        'notes', // Add notes field
    ];

    protected $casts = [
        'booking_date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Service relationship (uncommented and improved)
    // public function services()
    // {
    //     return $this->hasMany(Service::class);
    // }

    // Helper methods
    public function isUpcoming(): bool
    {
        return $this->booking_date->isFuture();
    }

    public function isToday(): bool
    {
        return $this->booking_date->isToday();
    }

    public function isPast(): bool
    {
        return $this->booking_date->isPast();
    }

    public function getServiceTypeLabel(): string
    {
        return match($this->service_type) {
            'minor service' => 'Minor Service',
            'major service' => 'Major Service',
            'modification' => 'Modification',
            default => ucfirst($this->service_type)
        };
    }

    /**
     * Return a Tailwind badge class for the booking status.
     */
    public function getStatusBadgeClassAttribute(): string
    {
        $s = strtolower($this->status ?? '');

        return match ($s) {
            'completed' => 'bg-green-100 text-green-800',
            'pending' => 'bg-indigo-100 text-indigo-800',
            'cancelled', 'canceled' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    /**
     * Return a normalized status label for display.
     */
    public function getStatusLabelAttribute(): string
    {
        $s = strtolower($this->status ?? '');
        return $s ? ucfirst($s) : 'Unknown';
    }
}
