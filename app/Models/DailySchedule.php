<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DailySchedule extends Model
{
    use HasFactory;

    protected $table = 'daily_schedules';

    protected $fillable = [
        'subscription_id',
        'delivery_date',
        'dish_id',
        'delivery_status',
        'is_locked',
        'delivery_notes',
    ];

    protected $casts = [
        'delivery_date' => 'date',
        'is_locked' => 'boolean',
    ];

    /**
     * Get the subscription associated with this daily schedule.
     */
    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }

    /**
     * Get the dish for this daily schedule.
     */
    public function dish(): BelongsTo
    {
        return $this->belongsTo(Dish::class);
    }
}
