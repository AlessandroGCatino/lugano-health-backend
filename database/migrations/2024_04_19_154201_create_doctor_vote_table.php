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
        Schema::create('doctor_vote', function (Blueprint $table) {

            $table->unsignedBigInteger('doctor_id')->required();
            $table->foreign('doctor_id')->references('id')->on('doctors')->cascadeOnDelete();

            $table->unsignedBigInteger('vote_id')->required();
            $table->foreign('vote_id')->references('id')->on('votes')->cascadeOnDelete();

            $table->primary(['doctor_id','vote_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_vote');
    }
};
