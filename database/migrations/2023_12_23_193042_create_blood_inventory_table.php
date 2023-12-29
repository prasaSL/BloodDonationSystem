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
        Schema::create('blood_inventory', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('blood_bank_id');
            $table->foreign('blood_bank_id')->references('id')->on('blood_banks')->onDelete('cascade');
            $table->boolean('is_available')->default(true);
            $table->boolean('is_tested')->default(false);
            $table->unsignedBigInteger('tested_by')->nullable();
            $table->foreign('tested_by')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('used_by')->nullable();
            $table->foreign('used_by')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->string('name_of_receiver')->nullable();
            $table->integer('quantity');
            $table->date('expiry_date');
            $table->boolean('is_approved')->default(false);
            $table->text('reason_for_rejection')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_inventory');
    }
};
