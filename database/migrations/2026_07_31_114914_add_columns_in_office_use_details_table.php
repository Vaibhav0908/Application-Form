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
        Schema::table('office_use_details', function (Blueprint $table) {
            $table->foreignId('candidate_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->string('experience_rating')->nullable()->after('candidate_id');
            $table->string('communication_skills')->nullable();
            $table->string('computer_skills')->nullable();
            $table->string('interpersonal_skills')->nullable();
            $table->string('learning_ability')->nullable();
            $table->string('presentation_skills')->nullable();
            $table->string('technical_skills')->nullable();
            $table->string('attitude')->nullable();
            $table->string('confidence')->nullable();
            $table->text('interview_remarks')->nullable();
            $table->decimal('salary_offered', 10, 2)->nullable();
            $table->date('interview_date')->nullable();
            $table->string('hr_name')->nullable();

            $table->enum('interview_status', [
                'Pending',
                'Shortlisted',
                'Selected',
                'Rejected',
                'On Hold',
                'Joined'
            ])->default('Pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('office_use_details', function (Blueprint $table) {
            $table->dropColumn([
                'experience_rating',
                'communication_skills',
                'computer_skills',
                'interpersonal_skills',
                'learning_ability',
                'presentation_skills',
                'technical_skills',
                'attitude',
                'confidence',
                'interview_remarks',
                'salary_offered',
                'interview_date',
                'hr_name',
                'interview_status',
            ]);
        });
    }
};
