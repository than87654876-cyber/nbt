<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubscriptionPause extends Model
{
    use HasFactory;

    protected $table = 'subscription_pauses';

    protected $fillable = [
        'subscription_id',
        'pause_start_date',
        'pause_end_date',
    ];

    protected $casts = [
        'pause_start_date' => 'date',
        'pause_end_date' => 'date',
    ];

    /**
     * Get the subscription associated with this pause.
     */
    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }
}
