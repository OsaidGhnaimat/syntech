<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAssessmentDetail extends Model
{
    protected $fillable = [
        'file_path',
        'link',
        'description',
        'assessment_id'
    ];

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }
}
