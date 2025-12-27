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
        Schema::table('student_candidate_temps', function (Blueprint $table) {
            $table->foreignId('building_id')->nullable()->after('user_id')->constrained()->nullOnDelete();
            $table->foreignId('study_program_id')->nullable()->after('building_id')->constrained()->nullOnDelete();
            $table->enum('registration_status', ['pending', 'approved', 'declined'])->default('pending')->after('phone_number');
            $table->timestamp('approved_at')->nullable()->after('registration_status');
            $table->timestamp('declined_at')->nullable()->after('approved_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_candidate_temps', function (Blueprint $table) {
            $table->dropForeign(['building_id']);
            $table->dropColumn('building_id');

            $table->dropForeign(['study_program_id']);
            $table->dropColumn('study_program_id');

            $table->dropColumn('registration_status');
            $table->dropColumn('approved_at');
            $table->dropColumn('declined_at');
        });
    }
};
