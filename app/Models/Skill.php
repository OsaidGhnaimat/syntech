<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'description',
        'type',
    ];

    public function cohort() {
        return $this->belongsToMany(Cohort::class);
    }

    public static function getOne($id){
        return self::findOrFail($id);
    }

    public static function insertTag($request)
    {
        return self::create([
            "name"        => $request->name,
            "description" => $request->description,
            "type"        => $request->type,
        ]);
    }

    public static function updateTag($request, $id){

        $row = self::findOrFail($id);
        return $row->update([
            "name"        => $request->name,
            "description" => $request->description,
            "type"        => $request->type,
        ]);
    }

    public static function deleteTag(int $id): bool
    {
        $row = self::find($id);
        return $row ? $row->delete() : false;
    }
}
