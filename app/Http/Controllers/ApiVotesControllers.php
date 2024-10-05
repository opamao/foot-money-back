<?php

namespace App\Http\Controllers;

use App\Models\Votes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ApiVotesControllers extends Controller
{
    public function toggleVote(Request $request)
    {

        $existingVote = Votes::where('utilisateur_id', $request->user)
            ->where('joueur_id', $request->joueur)
            ->where('match_id', $request->match)
            ->first();

        if ($existingVote) {
            $existingVote->delete();
            return response()->json(['message' => 'Vote annulé'], 200);
        } else {

            $votes = new Votes();
            $votes->id_vote = Str::uuid();
            $votes->utilisateur_id = $request->user;
            $votes->joueur_id = $request->joueur;
            $votes->match_id = $request->match;
            $votes->nombre_vote = 1;

            if ($votes->save()) {
                // On lui demande s'il veut faire un don, a la suite on déclanche l'api de don
                return response()->json(['message' => 'Vote enregistré'], 200);
            } else {
                return response()->json([
                    'message' => "Problème lors du vote. Veuillez réessayer!",
                ], 401);
            }
        }
    }

    public function cumulVote($match)
    {
        $topPlayers = Votes::join('joueurs', 'votes.joueur_id', '=', 'joueurs.id_joue')
            ->select('joueurs.nom_joue', DB::raw('SUM(votes.nombre_vote) as total_votes'))
            ->where('votes.match_id', $match)
            ->groupBy('votes.joueur_id','joueurs.nom_joue')
            ->orderBy('total_votes', 'desc')
            ->limit(5)
            ->get();

        return response()->json($topPlayers, 200);
    }
}
