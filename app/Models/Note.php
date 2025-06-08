<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    protected $fillable = [
        'notes',
        'task_id',
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
