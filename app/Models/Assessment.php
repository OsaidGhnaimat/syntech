<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assessment extends Model
{
    protected $fillable = [
        'progress_comment',
        'is_pass',
        'user_id',
        'brief_id'
    ];


    public function competency() {
        return $this->belongsToMany(Competency::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsToy(User::class);
    }

    public function brief() : BelongsTo
    {
        return $this->belongsToy(Brief::class);
    }
}
