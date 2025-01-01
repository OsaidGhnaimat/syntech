<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Student extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function insertStudent($data){
        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'phone_number' =>$data->phone_number,
            'address' =>$data->address,
            'password' => Hash::make($data->password),
        ]);
        return $user;
    }

    public static function updateStudent($request, $id){

        $user = User::findOrFail($id);
        return $user->update([
            // 'name'  => $request->name,
            // 'phone_number' => $request->email,
            // 'type'  => $request->type,
        ]);
    }

    public static function deleteStudent(int $id): bool
    {
        $user = User::find($id);
        return $user ? $user->delete() : false;
    }

}
