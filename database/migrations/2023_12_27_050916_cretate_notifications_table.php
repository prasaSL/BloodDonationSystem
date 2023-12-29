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
        Schema::create('notifications', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('sender_id');
        $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
        $table->string('receiver_type');
        $table->boolean('emergency')->default(false);
        $table->date('expiry_date')->nullable();
        $table->string('title', 100);
        $table->string('body');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
