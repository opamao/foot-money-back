<?php

namespace App\Http\Controllers;

use App\Models\Stades;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StadesControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stades = Stades::all();
        return view('stades.stades', compact('stades'));
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
            'libelle' => 'required',
            'photo' => 'required|file',
        ];
        $customMessages = [
            'libelle.required' => "Veuillez saisir le nom du stade.",
            'photo.required|file' => "Veuillez sélectionner la photo du stade.",
        ];
        $request->validate($roles, $customMessages);

        $fileStadeWithExtension = $request->file('photo')->getClientOriginalName();
        $imageStade = 'photo_stade_' . time() . '_' . '.' . $fileStadeWithExtension;
        $request->file('photo')->move(public_path('/stadeterrain'), $imageStade);

        $stade = new Stades();
        $stade->id_stade = Str::uuid();
        $stade->libelle_stade = $request->libelle;
        $stade->photo_stade = $imageStade;

        if ($stade->save()) {
            return back()->with('succes', $request->libelle . " a été ajouté");
        } else {
            return back()->withErrors("Impossible d'enregistrer " . $request->libelle . ". Veuillez reessayer!");
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
            'libelle' => 'required',
        ];
        $customMessages = [
            'libelle.required' => "Veuillez saisir le nom du stade.",
        ];
        $request->validate($roles, $customMessages);

        $photoStade = $request->file('photo');
        if ($photoStade !== null) {
            $fileStadeWithExtension = $photoStade->getClientOriginalName();
            $imageStade = 'photo_stade_' . time() . '_' . '.' . $fileStadeWithExtension;
            $photoStade->move(public_path('/stadeterrain'), $imageStade);

            Stades::where('id_stade', $id)
                ->update(
                    [
                        'libelle_stade' => $request->libelle,
                        'photo_stade' => $imageStade,
                    ]
                );
        } else {
            Stades::where('id_stade', $id)
                ->update(
                    [
                        'libelle_stade' => $request->libelle,
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
        Stades::findOrFail($id)->delete();

        return back()->with('succes', "La suppression a été efecctué");
    }
}
