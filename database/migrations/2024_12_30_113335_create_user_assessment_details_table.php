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
        Schema::create('user_assessment_details', function (Blueprint $table) {
            $table->id();
            $table->text('file_path')->nullable();
            $table->text('link')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('assessment_id');
            $table->foreign('assessment_id')->references('id')->on('assessments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_assessment_details');
    }
};
