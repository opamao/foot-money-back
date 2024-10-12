<?php

namespace App\Http\Controllers;

use App\Models\Joueurs;
use App\Models\Matchs;
use Illuminate\Http\Request;

class ApiMatchsControllers extends Controller
{
    public function getMatchs()
    {
        $matchs = Matchs::join('stades', 'matchs.stade_id', '=', 'stades.id_stade')
            ->join('clubs as club_one', 'matchs.club_one_id', '=', 'club_one.id_club')
            ->join('clubs as club_two', 'matchs.club_two_id', '=', 'club_two.id_club')
            ->select(
                'stades.libelle_stade',
                'club_one.nom_club as equipe_one',
                'club_one.logo_club as equipe_one_logo',
                'club_two.nom_club as equipe_two',
                'club_two.logo_club as equipe_two_logo',
                'matchs.*',
            )
            ->get();

        $matchs->transform(function ($item) {
            $item->equipe_one_logo = asset('foot/public/clubsequipe') . '/' . $item->equipe_one_logo;
            $item->equipe_two_logo = asset('foot/public/clubsequipe') . '/' . $item->equipe_two_logo;
            return $item;
        });

        return response()->json($matchs, 200);
    }

    public function getPlayers($club)
    {
        $players = Joueurs::where('club_id', '=', $club)
            ->select(
                'id_joue',
                'nom_joue',
                'prenom_joue',
                'naissance_joue',
                'poste_joue',
                'photo_joue',
                'dossard_joue',
            )
            ->get();

        $players->transform(function ($item) {
            $item->photo_joue = $item->photo_joue ? asset('foot/public/photojoueur') . '/' . $item->photo_joue : '';
            $item->naissance_joue = $item->naissance_joue ? $item->naissance_joue : '';
            return $item;
        });

        return response()->json($players, 200);
    }
}
