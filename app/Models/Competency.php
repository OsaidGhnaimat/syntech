<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Competency extends Model
{

    protected $fillable = [
        'title',
        'brief_id',
        'description'
    ];

    public function assessment() {
        return $this->belongsToMany(Assessment::class);
    }

    public function brief() : BelongsTo
    {
        return $this->belongsTo(Brief::class);
    }

    public static function getOne($id){
        return self::findOrFail($id);
    }

    public static function insertCompetency($request)
    {
        return self::create([
            "title"       => $request->title,
            "description" => $request->description,
            "brief_id"    => $request->brief_id,
        ]);
    }

    public static function updateCompetency($request, $id){

        $row = self::findOrFail($id);
        return $row->update([
            "title"       => $request->title,
            "description" => $request->description,
            "brief_id"    => $request->brief_id,
        ]);
    }

    public static function deleteCompetency(int $id): bool
    {
        $row = self::find($id);
        return $row ? $row->delete() : false;
    }
}
