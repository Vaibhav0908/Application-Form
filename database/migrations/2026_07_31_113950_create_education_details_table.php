<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('education_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->string('qualification');
            $table->string('college_university');
            $table->year('passing_year')->nullable();
            $table->string('percentage_cgpa')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('education_details');
    }
};