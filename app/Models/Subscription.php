<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'package_id',
        'start_date',
        'end_date',
        'remaining_days',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * Get the order associated with this subscription.
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the user associated with this subscription.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the package for this subscription.
     */
    public function package(): BelongsTo
    {
        return $this->belongsTo(ServicePackage::class, 'package_id');
    }

    /**
     * Get the daily schedules for this subscription.
     */
    public function dailySchedules(): HasMany
    {
        return $this->hasMany(DailySchedule::class);
    }

    /**
     * Get the pauses for this subscription.
     */
    public function pauses(): HasMany
    {
        return $this->hasMany(SubscriptionPause::class);
    }
}
