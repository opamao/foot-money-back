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
        Schema::create('clubs', function (Blueprint $table) {
            $table->uuid('id_club')->primary();
            $table->string('nom_club');
            $table->string('logo_club')->nullable();
            $table->string('ville_club');
            $table->string('phone_club')->unique()->nullable();
            $table->string('email_club')->unique()->nullable();
            $table->string('website_club')->nullable();
            $table->string('nom_respo_club');
            $table->string('phone_respo_club')->unique()->nullable();
            $table->string('email_respo_club')->unique()->nullable();
            $table->string('website_respo_club')->nullable();
            $table->string('photo_respo_club')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clubs');
    }
};
