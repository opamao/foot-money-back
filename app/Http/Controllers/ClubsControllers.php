<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clubs;
use App\Models\Joueurs;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ClubsControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clubs = Clubs::all();

        return view('clubs.clubs', compact('clubs'));
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
            'club' => 'required',
            'localite' => 'required',
            'logo' => 'required|file',
            'president' => 'required',
        ];
        $customMessages = [
            'club.required' => "Veuillez saisir le nom du club.",
            'localite.required' => "Veuillez saisir la localité du club.",
            'logo.required|file' => "Veuillez sélectionner le logo du club.",
            'president.required' => "Veuillez saisir le nom du président.",
        ];
        $request->validate($roles, $customMessages);

        $fileClubWithExtension = $request->file('logo')->getClientOriginalName();
        $imageClub = 'photo_club_' . time() . '_' . '.' . $fileClubWithExtension;
        $request->file('logo')->move(public_path('/clubsequipe'), $imageClub);

        $photoPresi = $request->file('image');
        if ($photoPresi !== null) {
            $filePresiWithExtension = $photoPresi->getClientOriginalName();
            $imagePresi = 'photo_presi_' . time() . '_' . '.' . $filePresiWithExtension;
            $photoPresi->move(public_path('/presis'), $imagePresi);
        }

        $club = new Clubs();
        $club->id_club = Str::uuid();
        $club->nom_club = $request->club;
        $club->logo_club = $imageClub;
        $club->ville_club = $request->localite;
        $club->phone_club = "+225".$request->phone;
        $club->email_club = $request->emailclub;
        $club->website_club = $request->site;
        $club->nom_respo_club = $request->president;
        $club->phone_respo_club = "+225".$request->telephone;
        $club->email_respo_club = $request->emailrespo;
        $club->website_respo_club = $request->siterespo;
        $club->photo_respo_club = $photoPresi === null ? "" : $imagePresi;

        if ($club->save()) {
            return back()->with('succes', $request->club . " a été ajouté");
        } else {
            return back()->withErrors("Impossible d'enregistrer " . $request->club . ". Veuillez reessayer!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $club = Clubs::find($id);
        $joueurs = Joueurs::where("club_id", $id)->get();

        return view('clubs.clubs-details', compact('club', 'joueurs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $club = Clubs::find($id);

        return view('clubs.edit-club', compact('club'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $roles = [
            'club' => 'required',
            'localite' => 'required',
            'president' => 'required',
        ];
        $customMessages = [
            'club.required' => "Veuillez saisir le nom du club.",
            'localite.required' => "Veuillez saisir la localité du club.",
            'president.required' => "Veuillez saisir le nom du président.",
        ];
        $request->validate($roles, $customMessages);

        $photoClub = $request->file('logo');
        $photoPresi = $request->file('image');
        if ($photoPresi !== null && $photoClub !== null) {

            $fileClubWithExtension = $request->file('logo')->getClientOriginalName();
            $imageClub = 'photo_club_' . time() . '_' . '.' . $fileClubWithExtension;
            $request->file('logo')->move(public_path('/clubsequipe'), $imageClub);

            $filePresiWithExtension = $photoPresi->getClientOriginalName();
            $imagePresi = 'photo_presi_' . time() . '_' . '.' . $filePresiWithExtension;
            $photoPresi->move(public_path('/presis'), $imagePresi);

            Clubs::where('id_club', $id)
                ->update(
                    [
                        'nom_club' => $request->club,
                        'logo_club' => $imageClub,
                        'ville_club' => $request->localite,
                        'phone_club' => $request->phone,
                        'email_club' => $request->emailclub,
                        'website_club' => $request->site,
                        'nom_respo_club' => $request->president,
                        'phone_respo_club' => $request->telephone,
                        'email_respo_club' => $request->emailrespo,
                        'website_respo_club' => $request->siterespo,
                        'photo_respo_club' => $imagePresi,
                    ]
                );
        } elseif ($photoPresi !== null && $photoClub === null) {
            $filePresiWithExtension = $photoPresi->getClientOriginalName();
            $imagePresi = 'photo_presi_' . time() . '_' . '.' . $filePresiWithExtension;
            $photoPresi->move(public_path('/presis'), $imagePresi);

            Clubs::where('id_club', $id)
                ->update(
                    [
                        'nom_club' => $request->club,
                        'ville_club' => $request->localite,
                        'phone_club' => $request->phone,
                        'email_club' => $request->emailclub,
                        'website_club' => $request->site,
                        'nom_respo_club' => $request->president,
                        'phone_respo_club' => $request->telephone,
                        'email_respo_club' => $request->emailrespo,
                        'website_respo_club' => $request->siterespo,
                        'photo_respo_club' => $imagePresi,
                    ]
                );
        } elseif ($photoPresi === null && $photoClub !== null) {
            $fileClubWithExtension = $request->file('logo')->getClientOriginalName();
            $imageClub = 'photo_club_' . time() . '_' . '.' . $fileClubWithExtension;
            $request->file('logo')->move(public_path('/clubsequipe'), $imageClub);

            Clubs::where('id_club', $id)
                ->update(
                    [
                        'nom_club' => $request->club,
                        'logo_club' => $imageClub,
                        'ville_club' => $request->localite,
                        'phone_club' => $request->phone,
                        'email_club' => $request->emailclub,
                        'website_club' => $request->site,
                        'nom_respo_club' => $request->president,
                        'phone_respo_club' => $request->telephone,
                        'email_respo_club' => $request->emailrespo,
                        'website_respo_club' => $request->siterespo,
                    ]
                );
        } else {
            Clubs::where('id_club', $id)
                ->update(
                    [
                        'nom_club' => $request->club,
                        'ville_club' => $request->localite,
                        'phone_club' => $request->phone,
                        'email_club' => $request->emailclub,
                        'website_club' => $request->site,
                        'nom_respo_club' => $request->president,
                        'phone_respo_club' => $request->telephone,
                        'email_respo_club' => $request->emailrespo,
                        'website_respo_club' => $request->siterespo,
                    ]
                );
        }

        return back()->with('succes', "La modification a été effectué");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Clubs::findOrFail($id)->delete();

        return back()->with('succes', "La suppression a été efecctué");
    }

    public function createPlayer(Request $request)
    {
        $roles = [
            'club' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'poste' => 'required',
            'phone' => 'required',
            'dossard' => 'required',
        ];
        $customMessages = [
            'club.required' => "Veuillez sélectionner le club.",
            'name.required' => "Veuillez saisir le nom du joueur.",
            'lastname.required' => "Veuillez saisir le prénom du joueur.",
            'poste.required' => "Veuillez saisir le poste du joueur.",
            'phone.required' => "Veuillez saisir le numéro de téléphone du joueur.",
            'dossard.required' => "Veuillez saisir le numéro dossard du joueur.",
        ];
        $request->validate($roles, $customMessages);

        $photoPresi = $request->file('photo');
        if ($photoPresi !== null) {
            $filePresiWithExtension = $photoPresi->getClientOriginalName();
            $imagePresi = 'photo_joueur_' . time() . '_' . '.' . $filePresiWithExtension;
            $photoPresi->move(public_path('/photojoueur'), $imagePresi);
        }

        $joueur = new Joueurs();
        $joueur->id_joue = Str::uuid();
        $joueur->nom_joue = $request->name;
        $joueur->prenom_joue = $request->lastname;
        $joueur->naissance_joue = $request->date;
        $joueur->poste_joue = $request->poste;
        $joueur->phone_joue = "+225".$request->phone;
        $joueur->email_joue = $request->email;
        $joueur->dossard_joue = $request->dossard;
        $joueur->password_joue = Hash::make('1234567890');
        $joueur->photo_joue = $photoPresi === null ? "" : $imagePresi;
        $joueur->club_id = $request->club;

        if ($joueur->save()) {
            return back()->with('succes', $request->name . " a été ajouté");
        } else {
            return back()->withErrors("Impossible d'enregistrer " . $request->name . ". Veuillez reessayer!");
        }
    }
    public function updatePlayer(Request $request)
    {
        $roles = [
            'name' => 'required',
            'lastname' => 'required',
            'poste' => 'required',
            'phone' => 'required',
            'dossard' => 'required',
        ];
        $customMessages = [
            'name.required' => "Veuillez saisir le nom du joueur.",
            'lastname.required' => "Veuillez saisir le prénom du joueur.",
            'poste.required' => "Veuillez saisir le poste du joueur.",
            'phone.required' => "Veuillez saisir le numéro de téléphone du joueur.",
            'dossard.required' => "Veuillez saisir le numéro dossard du joueur.",
        ];
        $request->validate($roles, $customMessages);

        $photoPresi = $request->file('photo');
        if ($photoPresi !== null) {
            $filePresiWithExtension = $photoPresi->getClientOriginalName();
            $imagePresi = 'photo_joueur_' . time() . '_' . '.' . $filePresiWithExtension;
            $photoPresi->move(public_path('/photojoueur'), $imagePresi);

            Joueurs::where('id_joue', $request->joueur)
                ->update(
                    [
                        'nom_joue' => $request->name,
                        'prenom_joue' => $request->lastname,
                        'naissance_joue' => $request->date,
                        'poste_joue' => $request->poste,
                        'phone_joue' => $request->phone,
                        'email_joue' => $request->email,
                        'dossard_joue' => $request->dossard,
                        'photo_joue' => $imagePresi,
                    ]
                );
        } else {
            Joueurs::where('id_joue', $request->joueur)
                ->update(
                    [
                        'nom_joue' => $request->name,
                        'prenom_joue' => $request->lastname,
                        'naissance_joue' => $request->date,
                        'poste_joue' => $request->poste,
                        'phone_joue' => $request->phone,
                        'email_joue' => $request->email,
                        'dossard_joue' => $request->dossard,
                    ]
                );
        }

        return back()->with('succes', "La modification a été effectué");
    }
    public function deletePlayer(Request $request)
    {
        Joueurs::findOrFail($request->joueur)->delete();

        return back()->with('succes', "La suppression a été efecctué");
    }
}
