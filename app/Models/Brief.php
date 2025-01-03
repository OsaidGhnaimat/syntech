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

    public static function getOne($id){
        return self::findOrFail($id);
    }

    public static function insertBrief($request, $imagePath = '')
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'expected_deliverables' => $request->expected_deliverables,
            'assessment_method' => $request->assessment_method,
            'context' => $request->context,
            'cohort_id' => $request->cohort_id,
        ];

        // Conditionally set 'image_path' only if it's not empty
        if (!empty($imagePath)) {
            $data['image_path'] = $imagePath;
        }
        // Create the record
        $row = self::create($data);
        return $row;
    }



    public static function updateBrief($request, $id, $imagePath = ''){

        $row = self::findOrFail($id);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'expected_deliverables' => $request->expected_deliverables,
            'assessment_method' => $request->assessment_method,
            'context' => $request->context,
            'cohort_id' => $request->cohort_id,
        ];

        if (!empty($imagePath)) {
            $data['image_path'] = $imagePath;
        }

        return $row->update($data);
    }

    public static function deleteBrief(int $id): bool
    {
        $row = self::find($id);
        return $row ? $row->delete() : false;
    }
}
