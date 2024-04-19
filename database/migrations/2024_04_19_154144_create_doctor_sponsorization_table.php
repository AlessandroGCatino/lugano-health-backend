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
        Schema::create('doctor_sponsorization', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("doctor_id")->nullable();
            $table->foreign("doctor_id")->references("id")->on("doctors")->cascadeOnDelete();

            $table->unsignedBigInteger("sponsorization_id")->nullable();
            $table->foreign("sponsorization_id")->references("id")->on("sponsorizations")->cascadeOnDelete();
            
            $table->dateTime("start")->required();
            $table->dateTime("deadline")->required();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_sponsorization');
    }
};
