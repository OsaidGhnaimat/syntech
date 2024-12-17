<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('briefs', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->longText('description')->nullable();
            $table->longText('expected_deliverables')->nullable();
            $table->longText('assessment_method')->nullable();
            $table->longText('context')->nullable();
            $table->text('image_path')->nullable();
            $table->foreignId('cohort_id')
            ->unsigned()
            ->nullable()
            ->references('id')
            ->on('cohorts')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('briefs');
    }
};
