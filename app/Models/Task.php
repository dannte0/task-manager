<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    protected $fillable = [
        'title',
        'details',
        'is_completed'
    ];

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }
}
