<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('office_use_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->string('experience_rating')->nullable();
            $table->string('communication_skills')->nullable();
            $table->string('computer_skills')->nullable();
            $table->string('interpersonal_skills')->nullable();
            $table->string('learning_ability')->nullable();
            $table->string('presentation_skills')->nullable();
            $table->string('technical_skills')->nullable();
            $table->string('attitude')->nullable();
            $table->string('interviewed_by')->nullable();
            $table->string('confidence')->nullable();
            $table->text('interview_remarks')->nullable();
            $table->decimal('salary_offered', 10, 2)->nullable();
            $table->date('interview_date')->nullable();
            $table->string('interview_status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('office_use_details');
    }
};
