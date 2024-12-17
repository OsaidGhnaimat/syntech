<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $fillable = [
        'name',
    ];

    public function brief() {
        return $this->belongsToMany(Brief::class);
    }
}
