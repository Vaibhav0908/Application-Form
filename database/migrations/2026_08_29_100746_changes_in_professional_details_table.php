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
        Schema::table('professional_details', function (Blueprint $table) {
            $table->string('company_name')->nullable()->change();
            $table->date('working_start_date')->nullable()->change();
            $table->date('working_end_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('professional_details', function (Blueprint $table) {
             $table->string('company_name')->nullable()->change();
             $table->date('working_start_date')->nullable()->change();
             $table->date('working_end_date')->nullable()->change();
        });
    }
};
