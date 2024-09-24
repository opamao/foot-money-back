<?php

namespace App\Http\Controllers;

use App\Models\Actualites;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ActualitesControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = Actualites::all();
        return view('news.news', compact('news'));
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
            'contenu' => 'required',
            'photo' => 'required|file',
        ];
        $customMessages = [
            'libelle.required' => "Veuillez saisir le titre de l'actualité.",
            'contenu.required' => "Veuillez saisir le contenu de l'actualité.",
            'photo.required|file' => "Veuillez sélectionner la photo de l'actualité.",
        ];
        $request->validate($roles, $customMessages);

        $fileStadeWithExtension = $request->file('photo')->getClientOriginalName();
        $imageStade = 'photo_news_' . time() . '_' . '.' . $fileStadeWithExtension;
        $request->file('photo')->move(public_path('/actualites'), $imageStade);

        $stade = new Actualites();
        $stade->id_news = Str::uuid();
        $stade->titre_news = $request->libelle;
        $stade->contenu_news = $request->contenu;
        $stade->photo_news = $imageStade;

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
            'contenu' => 'required',
        ];
        $customMessages = [
            'libelle.required' => "Veuillez saisir le titre de l'actualité.",
            'contenu.required' => "Veuillez saisir le contenu de l'actualité.",
        ];
        $request->validate($roles, $customMessages);

        $photoStade = $request->file('photo');
        if ($photoStade !== null) {
            $fileStadeWithExtension = $request->file('photo')->getClientOriginalName();
            $imageStade = 'photo_news_' . time() . '_' . '.' . $fileStadeWithExtension;
            $request->file('photo')->move(public_path('/actualites'), $imageStade);

            Actualites::where('id_news', $id)
                ->update(
                    [
                        'titre_news' => $request->libelle,
                        'contenu_news' => $request->contenu,
                        'photo_news' => $imageStade,
                    ]
                );
        } else {
            Actualites::where('id_news', $id)
                ->update(
                    [
                        'titre_news' => $request->libelle,
                        'contenu_news' => $request->libelle,
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
        Actualites::findOrFail($id)->delete();

        return back()->with('succes', "La suppression a été efecctué");
    }
}
