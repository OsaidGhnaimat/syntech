<?php

namespace Database\Seeders;

use App\Models\Cohort;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CohortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cohort::create([
            'title' => "first cohort",
            'student_number' => 50,
            'duration' => 180,
            'country' => "jordan",
            'image_path' => "fake image path",
            'start_date' => "2025-02-01",
            'end_date' => "2025-08-01",
            'cohort_category_id' => 1
        ]);
    }
}
