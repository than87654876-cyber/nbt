<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'description',
    ];

    /**
     * Get the dishes for this category.
     */
    public function dishes(): HasMany
    {
        return $this->hasMany(Dish::class);
    }
}
