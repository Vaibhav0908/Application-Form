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
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->string('user_type');

            $table->string('name');
            $table->date('date');

            $table->time('login_time')->nullable();
            $table->time('logout_time')->nullable();

            $table->integer('overtime')->default(0);

            $table->string('status')->default('present');

            $table->timestamps();

            $table->index(['user_id', 'user_type', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
