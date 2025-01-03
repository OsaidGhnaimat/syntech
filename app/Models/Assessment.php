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

    public static function getOne($id){
        return self::findOrFail($id);
    }

    public static function insertAssessment($request)
    {
        return self::create([
            "progress_comment" => $request->progress_comment,
            "is_pass"          => $request->is_pass,
            "user_id"          => $request->user_id,
            "brief_id"         => $request->brief_id,
        ]);
    }

    public static function updateAssessment($request, $id){

        $row = self::findOrFail($id);
        return $row->update([
            "progress_comment" => $request->progress_comment,
            "is_pass"          => $request->is_pass,
            "user_id"          => $request->user_id,
            "brief_id"         => $request->brief_id,
        ]);
    }

    public static function deleteAssessment(int $id): bool
    {
        $row = self::find($id);
        return $row ? $row->delete() : false;
    }
}
