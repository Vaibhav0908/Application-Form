<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');    
            $table->string('email')->unique();
            $table->string('contact_no');
            $table->string('alternate_contact')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('marital_status')->nullable();
            $table->text('permanent_address')->nullable();
            $table->text('current_address')->nullable();
            $table->string('applicant_designation')->nullable();
            $table->string('reference_name')->nullable();
            $table->string('platform_name')->nullable();
            $table->text('skills')->nullable();
            $table->string('resume')->nullable();
            $table->string('aadhar_card')->nullable();
            $table->string('passport_photo')->nullable();
            $table->string('degree_certificate')->nullable();
            $table->string('passbook')->nullable();
            $table->decimal('current_salary',10,2)->nullable();
            $table->decimal('expected_salary',10,2)->nullable();
            $table->string('total_experience')->nullable();
            $table->string('notice_period')->nullable();
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};