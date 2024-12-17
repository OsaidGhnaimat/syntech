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
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->longText('progress_comment')->nullable();
            $table->boolean('is_pass')->nullable();
            $table->foreignId('user_id')
            ->unsigned()
            ->nullable()
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->foreignId('brief_id')
            ->unsigned()
            ->nullable()
            ->references('id')
            ->on('briefs')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
