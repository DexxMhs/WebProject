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
        Schema::create('degree_levels', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->unique();              // e.g., S1, D3
            $table->string('name', 100);                       // e.g., Bachelor, Diploma
            $table->unsignedTinyInteger('duration_years')->nullable(); // e.g., 3, 4
            $table->string('image')->nullable();               // image path
            $table->text('description')->nullable();           // optional description
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('degree_levels');
    }
};
