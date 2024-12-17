<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Competency extends Model
{

    protected $fillable = [
        'title',
        'brief_id'
    ];

    public function assessment() {
        return $this->belongsToMany(Assessment::class);
    }

    public function brief() : BelongsTo
    {
        return $this->belongsTo(Brief::class);
    }
}
