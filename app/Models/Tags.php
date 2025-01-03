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



    public static function getOne($id){
        return self::findOrFail($id);
    }

    public static function insertTag($request)
    {
        return self::create(["name" => $request["name"]]);
    }

    public static function updateTag($request, $id){

        $row = self::findOrFail($id);
        return $row->update(["name" => $request["name"]]);
    }

    public static function deleteTag(int $id): bool
    {
        $row = self::find($id);
        return $row ? $row->delete() : false;
    }
}
