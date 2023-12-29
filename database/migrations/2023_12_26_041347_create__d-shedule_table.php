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
        Schema::create('d-schedule', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donor_id');
            $table->foreign('donor_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('blood_bank_id');
            $table->foreign('blood_bank_id')->references('id')->on('blood_banks')->onDelete('cascade');
            $table->string('blood_group')->nullable();
            $table->date('date');
            $table->time('time');
            $table->boolean('donated')->default(false);
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d-schedule');
    }
};
