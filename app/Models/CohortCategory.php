<?php

namespace App\Models;

use Hash;
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

    public static function getOne($id){
        return self::findOrFail($id);
    }

    public static function insertCohortCategory($request){
        $row = CohortCategory::create([
            'title' => $request["title"],
        ]);
        return $row;
    }

    public static function updateCohortCategory($request, $id){

        $row = CohortCategory::findOrFail($id);

        return $row->update([
            'title'  => $request->title,
        ]);
    }

    public static function deleteCohortCategory(int $id): bool
    {
        $row = CohortCategory::find($id);
        return $row ? $row->delete() : false;
    }
}
