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
        Schema::create('recompenses', function (Blueprint $table) {
            $table->uuid('id_recom')->primary();
            $table->string('type_recom')->comment('maillot, internet, tickets');
            $table->string('description_recom');
            $table->string('statut_recom')->comment('encours, reclame, livrer');
            $table->uuid('utilisateur_id');
            $table->foreign('utilisateur_id')->references('id_user')->on('utilisateurs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recompenses');
        Schema::table('recompenses', function (Blueprint $table) {
            $table->dropForeign(['utilisateur_id']);
            $table->dropColumn('utilisateur_id');
        });
    }
};
