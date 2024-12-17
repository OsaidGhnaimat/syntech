<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
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
