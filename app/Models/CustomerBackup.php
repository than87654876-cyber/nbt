<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CustomerBackup extends Model
{
    protected $fillable = [
        'filename',
        'storage_path',
        'size',
        'status',
        'created_by',
        'restored_by',
        'restored_at',
    ];

    protected $casts = [
        'size' => 'integer',
        'restored_at' => 'datetime',
    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function restoredBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'restored_by');
    }

    public function logs(): HasMany
    {
        return $this->hasMany(CustomerBackupLog::class, 'backup_id');
    }
}
