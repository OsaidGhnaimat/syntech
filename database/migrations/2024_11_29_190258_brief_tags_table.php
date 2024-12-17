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
        Schema::create('brief_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brief_id');
            $table->unsignedBigInteger('tags_id');
            $table->timestamps();

            $table->foreign('brief_id')->references('id')->on('briefs')->onDelete('cascade');
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
