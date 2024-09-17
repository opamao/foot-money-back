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
        Schema::create('votes', function (Blueprint $table) {
            $table->uuid('id_vote')->primary();
            $table->integer('nombre_vote');
            $table->uuid('utilisateur_id');
            $table->foreign('utilisateur_id')->references('id_user')->on('utilisateurs');
            $table->uuid('joueur_id');
            $table->foreign('joueur_id')->references('id_joue')->on('joueurs');
            $table->uuid('match_id');
            $table->foreign('match_id')->references('id_match')->on('matchs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
        Schema::table('votes', function (Blueprint $table) {
            $table->dropForeign(['utilisateur_id', 'joueur_id', 'match_id']);
            $table->dropColumn('utilisateur_id');
            $table->dropColumn('joueur_id');
            $table->dropColumn('match_id');
        });
    }
};
