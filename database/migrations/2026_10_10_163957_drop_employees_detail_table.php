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
           Schema::dropIfExists('employees_detail');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('employee_detail', function (Blueprint $table) {
        $table->id();
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('salary')->nullable();
            $table->date('joing_date')->nullable();
            $table->string('calender')->nullable();
            $table->string('calender')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('last_seen')->nullable();
            $table->timestamps();
    });
    }
};
