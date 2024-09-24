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
        Schema::create('matchs', function (Blueprint $table) {
            $table->uuid('id_match')->primary();
            $table->date('debut');
            $table->time('heure');
            $table->uuid('club_one_id');
            $table->foreign('club_one_id')->references('id_club')->on('clubs');
            $table->uuid('club_two_id');
            $table->foreign('club_two_id')->references('id_club')->on('clubs');
            $table->uuid('stade_id');
            $table->foreign('stade_id')->references('id_stade')->on('stades');
            $table->enum('statut', ['encours', 'termine']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matchs');
        Schema::table('matchs', function (Blueprint $table) {
            $table->dropForeign(['club_one_id', 'club_two_id', 'stade_id']);
            $table->dropColumn('club_one_id');
            $table->dropColumn('club_two_id');
            $table->dropColumn('stade_id');
        });
    }
};
