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
        Schema::create('curriculum', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->foreignId('study_program_id')->constrained()->onDelete('cascade');
            $table->foreignId('academic_semester_id')->constrained()->onDelete('cascade'); // periode
            $table->foreignId('semester_id')->constrained()->onDelete('cascade'); // semester ke-berapa
            $table->timestamps();

            $table->unique(['course_id', 'study_program_id', 'academic_semester_id', 'semester_id'], 'curriculum_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriculum');
    }
};
