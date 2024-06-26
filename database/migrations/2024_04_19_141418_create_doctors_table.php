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
        Schema::create('doctors', function (Blueprint $table) {

            $table->id();
            $table->string("name")->required();
            $table->string("surname")->required();
            $table->text("performances")->nullable();
            $table->string("CV")->nullable();
            $table->string("address")->required();
            $table->string("ProfilePic")->nullable();
            $table->string("phone_number")->nullable();
            $table->string('slug', 255)->unique();

            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("set null");


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
