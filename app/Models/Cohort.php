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

    public static function insertCohort($request, $imagePath = '')
    {
        $data = [
           'title' => $request->title,
            'student_number' => $request->student_number,
            'duration' => $request->duration,
            'country' => $request->country,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'cohort_category_id' => $request->cohort_category_id
        ];

        // Conditionally set 'image_path' only if it's not empty
        if (!empty($imagePath)) {
            $data['image_path'] = $imagePath;
        }
        // Create the record
        $row = self::create($data);
        return $row;
    }

    public static function updateCohort($request, $id, $imagePath = ''){

        $row = self::findOrFail($id);

        $data = [
            'title' => $request->title,
            'student_number' => $request->student_number,
            'duration' => $request->duration,
            'country' => $request->country,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'cohort_category_id' => $request->cohort_category_id
        ];

        if (!empty($imagePath)) {
            $data['image_path'] = $imagePath;
        }

        return $row->update($data);
    }


    public static function deleteCohort(int $id): bool
    {
        $row = self::find($id);
        return $row ? $row->delete() : false;
    }
}
