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
        Schema::create('sponsorizations', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', 4,2);
            $table->string('name', 255)->unique();
            $table->string('description');
            $table->smallInteger('durata');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsorizations');
    }
};
