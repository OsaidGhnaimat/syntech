<?php

namespace Database\Seeders;

use App\Models\Brief;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BriefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brief::create([
            'title' => "first Brief",
            'description' => "fake description",
            'expected_deliverables' => "fake expected_deliverables",
            'assessment_method' => "fake assessment_method",
            'context' => "fake context",
            'cohort_id' => 1,
            'image_path' => "fake image path",
        ]);
    }
}
