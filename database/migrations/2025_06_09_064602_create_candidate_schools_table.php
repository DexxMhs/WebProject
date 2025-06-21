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
        Schema::create('candidate_schools', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'student_candidate_temp_id')->constrained()->cascadeOnDelete();
            $table->string('education_level');
            $table->string('abbreviation');
            $table->string('school_name');
            $table->string('graduation_year');
            $table->string('major');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_schools');
    }
};
