<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brief extends Model
{

    protected $fillable = [
        'title',
        'description',
        'expected_deliverables',
        'assessment_method',
        'context',
        'cohort_id',
        'image_path'
    ];

    public function tags() {
        return $this->belongsToMany(Tags::class);
    }

    public function cohort() : BelongsTo
    {
        return $this->belongsTo(Cohort::class);
    }

    public function assessment() : HasMany
    {
        return $this->hasMany(Assessment::class);
    }

    public function competency() : HasMany
    {
        return $this->hasMany(Competency::class);
    }
}
