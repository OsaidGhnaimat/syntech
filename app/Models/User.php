<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'address'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function cohort() {
        return $this->belongsToMany(Cohort::class);
    }

    public function assessment() : HasMany
    {
        return $this->hasMany(Assessment::class);
    }


    // public static function insertUser($data){
    //     $user = User::create([
    //         'name' => $data->name,
    //         'email' => $data->email,
    //         'phone_number' =>$data->phone_number,
    //         'address' =>$data->address,
    //         'password' => Hash::make($data->password),
    //     ]);
    //     return $user;
    // }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function teacher()
    {
        return $this->hasOne(Trainer::class);
    }

    public static function getUser(int $id): ?User
    {
        return self::find($id) ?? null;
    }

    public static function getOne($userId = ''){
        if(empty($userId)){
            $userId = Auth::id();
        }
        return User::findOrFail($userId);
    }

    public static function updateUser($request, $id){

        $user = User::findOrFail($id);

        return $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'password'  => $request->password,
            'address'  => $request->address,
            'phone_number'  => $request->phone_number
        ]);
    }


}
