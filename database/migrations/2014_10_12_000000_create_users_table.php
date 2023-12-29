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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Fname');
            $table->string('Lname');
            $table->string('national_id')->unique();
            $table->date('date_of_birth')->nullable( );
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('blood_type')->nullable();
            $table->text('health_history')->nullable();
            $table->date('last_donation_date')->nullable();
            $table->boolean('eligibility_status')->default(true);
            $table->text('address')->nullable();
            $table->string('location')->nullable();
            $table->unsignedBigInteger('blood_bank_id')->nullable();
            $table->foreign('blood_bank_id')->references('id')->on('blood_banks')->onDelete('cascade');
            $table->unsignedBigInteger('hospital_id')->nullable();
            $table->foreign('hospital_id')->references('id')->on('hospitals')->onDelete('cascade');
            $table->string('password');
            $table->enum('role',['administrator', 'donor', 'hospital_staff', 'blood_bank_staff', 'lab_technician', 'recipient', 'volunteer_coordinator', 'dispatcher', 'auditor'])->default('donor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
