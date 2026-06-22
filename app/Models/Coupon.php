<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'coupon_code',
        'discount_type',
        'discount_value',
        'min_order_value',
        'start_date',
        'end_date',
        'usage_limit',
    ];

    protected $casts = [
        'discount_value' => 'decimal:2',
        'min_order_value' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * Get the orders that use this coupon.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
