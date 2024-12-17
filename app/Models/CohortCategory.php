<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CohortCategory extends Model
{
    protected $fillable = [
        'title',
    ];

    public function cohort() : HasMany
    {
        return $this->hasMany(Cohort::class);
    }
}
