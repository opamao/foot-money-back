<?php

namespace App\Http\Controllers;

use App\Models\Clubs;
use App\Models\Matchs;
use App\Models\Stades;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MatchsControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
        $stades = Stades::select('libelle_stade', 'id_stade',)->get();
        $clubs = Clubs::select('nom_club', 'id_club',)->get();

        return view('matchs.matchs', compact('matchs', 'stades', 'clubs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $roles = [
            'journee' => 'required',
            'date' => 'required',
            'time' => 'required',
            'stade' => 'required',
            'equipeOne' => 'required',
            'equipeTwo' => 'required',
        ];
        $customMessages = [
            'journee.required' => "Veuillez sélectionner la journée du match.",
            'date.required' => "Veuillez saisir la date du match.",
            'time.required' => "Veuillez saisir l'heure du match.",
            'stade.required' => "Veuillez sélectionner le stade ou se jouera la match.",
            'equipeOne.required' => "Veuillez sélectionner l'équipe 1 du match'.",
            'equipeTwo.required' => "Veuillez sélectionner l'équipe 2 du match.",
        ];
        $request->validate($roles, $customMessages);

        $match = new Matchs();
        $match->id_match = Str::uuid();
        $match->debut = $request->date;
        $match->heure = $request->time;
        $match->club_one_id = $request->equipeOne;
        $match->club_two_id = $request->equipeTwo;
        $match->stade_id = $request->stade;
        $match->journee = $request->journee;

        if ($match->save()) {
            return back()->with('succes', "Le match a été ajouté");
        } else {
            return back()->withErrors("Impossible d'enregistrer. Veuillez reessayer!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $roles = [
            'journee' => 'required',
            'date' => 'required',
            'time' => 'required',
            'stade' => 'required',
            'equipeOne' => 'required',
            'equipeTwo' => 'required',
        ];
        $customMessages = [
            'journee.required' => "Veuillez sélectionner la journée du match.",
            'date.required' => "Veuillez saisir la date du match.",
            'time.required' => "Veuillez saisir l'heure du match.",
            'stade.required' => "Veuillez sélectionner le stade ou se jouera la match.",
            'equipeOne.required' => "Veuillez sélectionner l'équipe 1 du match'.",
            'equipeTwo.required' => "Veuillez sélectionner l'équipe 2 du match.",
        ];
        $request->validate($roles, $customMessages);

        Matchs::where('id_match', $id)
            ->update(
                [
                    'debut' => $request->date,
                    'heure' => $request->time,
                    'club_one_id' => $request->equipeOne,
                    'club_two_id' => $request->equipeTwo,
                    'stade_id' => $request->stade,
                    'journee' => $request->journee,
                ]
            );

        return back()->with('succes', "La modification a été effectué");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Matchs::findOrFail($id)->delete();

        return back()->with('succes', "La suppression a été efecctué");
    }
}
