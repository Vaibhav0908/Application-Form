<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('professional_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->string('company_name');
            $table->string('designation')->nullable();
            $table->string('experience')->nullable();
            $table->decimal('salary_ctc',10,2)->nullable();
            $table->string('currently_working')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('professional_details');
    }
};