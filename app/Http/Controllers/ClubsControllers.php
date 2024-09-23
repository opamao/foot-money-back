<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clubs;
use App\Models\Joueurs;
use Illuminate\Support\Str;

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
        //use Illuminate\Support\Facades\Hash;
        //$respo->password = Hash::make('1234567890');
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
        if (!$photoPresi === null) {
            $filePresiWithExtension = $photoPresi->getClientOriginalName();
            $imagePresi = 'photo_presi_' . time() . '_' . '.' . $filePresiWithExtension;
            $photoPresi->move(public_path('/presis'), $imagePresi);
        }

        $club = new Clubs();
        $club->id_club = Str::uuid();
        $club->nom_club = $request->club;
        $club->logo_club = $imageClub;
        $club->ville_club = $request->localite;
        $club->phone_club = $request->phone;
        $club->email_club = $request->emailclub;
        $club->website_club = $request->site;
        $club->nom_respo_club = $request->president;
        $club->phone_respo_club = $request->telephone;
        $club->email_respo_club = $request->emailrespo;
        $club->website_respo_club = $request->siterespo;
        $club->photo_respo_club = $photoPresi === null ? "" : $imagePresi;
        $club->save();

        return back()->with('succes', $request->club . " a été ajouté");
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $roles = [
            'nom' => 'required',
            'prenom' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ];
        $customMessages = [
            'nom.required' => "Veuillez saisir le nom",
            'prenom.required' => "Veuillez saisir le prénom",
            'phone.required' => "Veuillez saisir le téléphone",
            'email.required' => "Veuillez saisir le email",
        ];
        $request->validate($roles, $customMessages);

        Clubs::where('id', $id)
            ->update(
                [
                    'name' => $request->nom,
                    'email' => $request->email,
                    'prenom' => $request->prenom,
                    'phone' => $request->phone,
                ]
            );

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

    public function createPlayer(Request $request){

    }
    public function updatePlayer(Request $request){

    }
    public function deletePlayer(string $id){

    }
}
