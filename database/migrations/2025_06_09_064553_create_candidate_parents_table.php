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
        Schema::create('candidate_parents', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'student_candidate_temp_id')->constrained()->cascadeOnDelete();
            $table->string('parent_name');
            $table->enum('relationship', ['ayah', 'ibu', 'wali']);
            $table->string('parent_job_type');
            $table->string('parent_last_education');
            $table->string('parent_email');
            $table->string('parent_phone_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_parents');
    }
};
