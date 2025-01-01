<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        return $this->belongsTo(User::class);
    }

    public function brief() : BelongsTo
    {
        return $this->belongsTo(Brief::class);
    }

    public function userAssessmentDetail() : HasMany
    {
        return $this->hasMany(UserAssessmentDetail::class);
    }
}
