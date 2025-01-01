<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $trainerRole = Role::create(['name' => 'trainer']);
        $studentRole = Role::create(['name' => 'student']);

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make(12345678),
        ]);
        $user->assignRole($adminRole->name);


        $user = User::create([
            'name' => 'trainer',
            'email' => 'trainer@example.com',
            'password' => Hash::make(12345678),
        ]);
        $user->assignRole($trainerRole->name);


        $user = User::create([
            'name' => 'student',
            'email' => 'student@example.com',
            'password' => Hash::make(12345678),
        ]);
        $user->assignRole($studentRole->name);


        $user = User::create([
            'name' => 'osaid',
            'email' => 'osaid.ghnaimat@gmail.com',
            'password' => Hash::make(12345678),
        ]);
        $user->assignRole($studentRole->name);
    }
}
