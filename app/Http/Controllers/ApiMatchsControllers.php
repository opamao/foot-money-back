<?php

namespace App\Http\Controllers;

use App\Models\Joueurs;
use App\Models\Matchs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiMatchsControllers extends Controller
{
    public function getMatchs($date)
    {
        $matchs = Matchs::join('stades', 'matchs.stade_id', '=', 'stades.id_stade')
            ->join('clubs as club_one', 'matchs.club_one_id', '=', 'club_one.id_club')
            ->join('clubs as club_two', 'matchs.club_two_id', '=', 'club_two.id_club')
            // Sous-requête pour calculer le total des votes
            ->leftJoin(DB::raw('(SELECT match_id, SUM(nombre_vote) as total_votes FROM votes GROUP BY match_id) as votes'), 'matchs.id_match', '=', 'votes.match_id')
            ->select(
                'stades.libelle_stade',
                'club_one.nom_club as equipe_one',
                'club_one.logo_club as equipe_one_logo',
                'club_two.nom_club as equipe_two',
                'club_two.logo_club as equipe_two_logo',
                'matchs.*',
                DB::raw('IF(votes.total_votes > 15, "+15", votes.total_votes) as total_votes_display') // Limitation à +15 si nécessaire
            )
            ->whereDate('matchs.debut', '=', $date)
            ->get();

        $matchs->transform(function ($item) {
            // Mise à jour des liens d'image
            $item->equipe_one_logo = asset('foot/public/clubsequipe') . '/' . $item->equipe_one_logo;
            $item->equipe_two_logo = asset('foot/public/clubsequipe') . '/' . $item->equipe_two_logo;

            // Si aucun vote, afficher 0
            if (is_null($item->total_votes_display)) {
                $item->total_votes_display = 0;
            }

            return $item;
        });

        return response()->json($matchs, 200);
    }

    public function getPlayers($club, $match, $user)
    {
        $players = Joueurs::where('club_id', '=', $club)
            ->leftJoin('votes', function ($join) use ($match, $user) {
                $join->on('joueurs.id_joue', '=', 'votes.joueur_id')
                    ->where('votes.match_id', '=', $match)
                    ->where('votes.utilisateur_id', '=', $user)
                    ->where('votes.nombre_vote', '>', 0);
            })
            ->select(
                'joueurs.id_joue',
                'joueurs.nom_joue',
                'joueurs.prenom_joue',
                'joueurs.naissance_joue',
                'joueurs.poste_joue',
                'joueurs.photo_joue',
                'joueurs.dossard_joue',
                DB::raw('IF(votes.nombre_vote IS NULL, 0, 1) as homme_du_match') // Indicateur pour l'homme du match
            )
            ->get();

        $players->transform(function ($item) {
            $item->photo_joue = $item->photo_joue ? asset('foot/public/photojoueur') . '/' . $item->photo_joue : '';
            $item->naissance_joue = $item->naissance_joue ? $item->naissance_joue : '';
            return $item;
        });

        return response()->json($players, 200);
    }

    public function getHistory($user)
    {
        $matchs = Matchs::join('stades', 'matchs.stade_id', '=', 'stades.id_stade')
            ->join('clubs as club_one', 'matchs.club_one_id', '=', 'club_one.id_club')
            ->join('clubs as club_two', 'matchs.club_two_id', '=', 'club_two.id_club')
            // Sous-requête pour calculer le total des votes
            ->leftJoin(DB::raw('(SELECT match_id, SUM(nombre_vote) as total_votes FROM votes GROUP BY match_id) as votes'), 'matchs.id_match', '=', 'votes.match_id')
            // Sous-requête pour vérifier si l'utilisateur a voté pour ce match
            ->leftJoin(DB::raw("(SELECT match_id, COUNT(*) as user_voted FROM votes WHERE utilisateur_id = '$user' GROUP BY match_id) as user_votes"), 'matchs.id_match', '=', 'user_votes.match_id')
            ->select(
                'stades.libelle_stade',
                'club_one.nom_club as equipe_one',
                'club_one.logo_club as equipe_one_logo',
                'club_two.nom_club as equipe_two',
                'club_two.logo_club as equipe_two_logo',
                'matchs.*',
                DB::raw('IF(votes.total_votes > 15, "+15", votes.total_votes) as total_votes_display'),
                DB::raw('IF(user_votes.user_voted > 0, 1, 0) as user_has_voted') // 1 si l'utilisateur a voté, sinon 0
            )
            ->get();

        $matchs->transform(function ($item) {
            // Mise à jour des liens d'image
            $item->equipe_one_logo = asset('foot/public/clubsequipe') . '/' . $item->equipe_one_logo;
            $item->equipe_two_logo = asset('foot/public/clubsequipe') . '/' . $item->equipe_two_logo;

            // Si aucun vote, afficher 0
            if (is_null($item->total_votes_display)) {
                $item->total_votes_display = 0;
            }

            return $item;
        });

        return response()->json($matchs, 200);

    }
}
