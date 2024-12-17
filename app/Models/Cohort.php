<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cohort extends Model
{

    protected $fillable = [
        'title',
        'student_number',
        'duration',
        'country',
        'image_path',
        'start_date',
        'end_date',
        'cohort_category_id'
    ];

    public function user() {
        return $this->belongsToMany(User::class);
    }

    public function brief() : HasMany
    {
        return $this->hasMany(Brief::class);
    }

    public function skill() {
        return $this->belongsToMany(Skill::class);
    }

    public function cohort_category() : BelongsTo
    {
        return $this->belongsTo(CohortCategory::class);
    }
}
