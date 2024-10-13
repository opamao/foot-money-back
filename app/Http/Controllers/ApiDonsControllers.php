<?php

namespace App\Http\Controllers;

use App\Models\Dotations;
use App\Models\Votes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiDonsControllers extends Controller
{
    public function makeDonation(Request $request)
    {
        $donation = new Dotations();
        $donation->id_dot = Str::uuid();
        $donation->utilisateur_id = $request->user;
        $donation->methode_paiement_dot = $request->methode;
        $donation->montant_dot = $request->montant;
        $donation->joueur_id = $request->joueur;
        $donation->match_id = $request->match;

        if ($donation->save()) {
            // On lui demande s'il veut faire un don, a la suite on déclanche l'api de don
            return response()->json(['success' => "Votre don a été attribué au joueur."]);
        } else {
            return response()->json([
                'message' => "Problème lors du don. Veuillez réessayer!",
            ], 401);
        }

    }
}
