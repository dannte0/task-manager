<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    protected $fillable = [
        'title',
        'details',
        'is_completed',
        'is_pinned'
    ];

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function scopeTitle(Builder $query, $title): Builder
    {
        return $query->where('title', 'LIKE', '%'. $title . '%');
    }
}
