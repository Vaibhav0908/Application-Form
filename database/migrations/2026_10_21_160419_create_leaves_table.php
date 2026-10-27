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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')
                ->constrained('employee_details')
                ->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('leave_type')->nullable();
            $table->string('days')->nullable();
            $table->date('half_day_date')->nullable();
            $table->date('full_day_date')->nullable();
            $table->date('paid_day_date')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('time')->nullable();
            $table->text('reason')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
