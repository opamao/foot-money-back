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
        Schema::create('joueurs', function (Blueprint $table) {
            $table->uuid('id_joue')->primary();
            $table->string('nom_joue');
            $table->string('prenom_joue');
            $table->string('naissance_joue');
            $table->string('poste_joue');
            $table->string('phone_joue', 50)->unique();
            $table->string('email_joue')->unique()->nullable();
            $table->string('photo_joue')->nullable();
            $table->uuid('club_id');
            $table->foreign('club_id')->references('id_club')->on('clubs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('joueurs');
        Schema::table('joueurs', function (Blueprint $table) {
            $table->dropForeign(['club_id']);
            $table->dropColumn('club_id');
        });
    }
};
