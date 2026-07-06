<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerBackupLog extends Model
{
    protected $fillable = [
        'backup_id',
        'action',
        'message',
        'performed_by',
    ];

    public function backup(): BelongsTo
    {
        return $this->belongsTo(CustomerBackup::class, 'backup_id');
    }

    public function performedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'performed_by');
    }
}
