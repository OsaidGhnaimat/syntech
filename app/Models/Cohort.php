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

    public static function getOne($id){
        return self::findOrFail($id);
    }

    public static function insertCohort($request){
        $row = Cohort::create([
            'title' => $request->title,
            'student_number' => $request->student_number,
            'duration' => $request->duration,
            'country' => $request->country,
            'image_path' => $request->image_path,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'cohort_category_id' => $request->cohort_category_id
        ]);
        return $row;
    }

    public static function updateCohort($request, $id){

        $row = Cohort::findOrFail($id);

        return $row->update([
            'title' => $request->title,
            'student_number' => $request->student_number,
            'duration' => $request->duration,
            'country' => $request->country,
            'image_path' => $request->image_path,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'cohort_category_id' => $request->cohort_category_id
        ]);
    }

    public static function deleteCohort(int $id): bool
    {
        $row = Cohort::find($id);
        return $row ? $row->delete() : false;
    }
}
