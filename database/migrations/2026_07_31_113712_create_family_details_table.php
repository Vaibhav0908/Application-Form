<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('family_details', function (Blueprint $table) {

            $table->id();
            $table->foreignId('candidate_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->string('member_name');
            $table->string('relationship');
            $table->string('mobile')->nullable();
            $table->string('occupation')->nullable();
            $table->integer('age')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('family_details');
    }
};