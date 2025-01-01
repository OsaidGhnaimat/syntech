<?php

namespace Database\Seeders;

use App\Models\CohortCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CohortCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CohortCategory::create(['title' => "full stack development"]);
    }
}
