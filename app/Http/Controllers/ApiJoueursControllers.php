<?php

namespace App\Http\Controllers;

use App\Models\Joueurs;
use Illuminate\Http\Request;

class ApiJoueursControllers extends Controller
{
    public function postLoginJoueur(Request $request)
    {
        $rules = [
            'login' => 'required|min:8',
            'password' => 'required'
        ];

        $messages = [
            'login.required' => 'Votre numéro de téléphone est obligatoire.',
            'login.min' => 'Veuillez saisir au moins 8 caractères.',
            'password.required' => 'Veuillez saisir votre mot de passe.',
        ];

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first('login'),
            ], 422);
        }

        $user = Joueurs::where('phone_joue', $request->login)
            ->orWhere('email_joue', $request->login)
            ->where('password_joue', $request->password)
            ->first();
        if ($user) {

            return response()->json(
                [
                    'identifiant' => $user->id_joue,
                    'nom' => $user->nom_joue,
                    'prenom' => $user->prenom_joue,
                    'phone' => $user->phone_joue,
                    'poste' => $user->poste_joue,
                    'club' => $user->club_id,
                    'naissance' => $user->naissance_joue,
                    'email' => $user->email_joue ?? "",
                    'photo' => $user->photo_joue == null ? "" : asset('joueurs') . '/' . $user->photo_joue ?? "",
                ],
                200
            );
        } else {

            return response()->json([
                'message' => "Vous n'avez pas de compte. Veuillez contacter l'admin"
            ], 401);
        }
    }

    public function postPhotoJoueur(Request $request)
    {

        $galeries = $request->file('photo');
        if (is_array($galeries)) {
            foreach ($galeries as $file) {
                $fileNameWithExtension = $file->getClientOriginalName();

                $imageName = 'photo_joueur_' . time() . '_' . '.' . $fileNameWithExtension;

                $file->move(public_path('/joueurs'), $imageName);

                Joueurs::where('id_joue', $request->identifiant)
                    ->update([
                        'photo_joue' => $imageName,
                    ]);

                return response()->json([
                    'message' => "Votre photo a été ajouté.",
                ], 200);
            }
        } else {
            $fileNameWithExtension = $galeries->getClientOriginalName();
            $imageName = 'photo_joueur_' . time() . '_' . '.' . $fileNameWithExtension;

            $galeries->move(public_path('/joueurs'), $imageName);

            Joueurs::where('id_joue', $request->identifiant)
                ->update([
                    'photo_joue' => $imageName,
                ]);

            return response()->json([
                'message' => "Votre photo a été ajouté.",
            ], 200);
        }
    }

    public function postAddEmailJoueur(Request $request)
    {
        if (empty($request->email)) {
            return response()->json([
                'message' => 'Votre adresse e-mail est obligatoire.',
            ], 422);
        }

        $user = Joueurs::where('email_joue', $request->email)->first();
        if ($user) {
            return response()->json([
                'message' => "L'adresse e-mail est déjà utilisé. Veuillez essayer un autre."
            ], 422);
        }

        Joueurs::where('id_joue', $request->identifiant)
            ->update([
                'email_joue' => $request->email,
            ]);

        return response()->json([
            'message' => "Votre adresse e-mail a été ajouté.",
        ], 200);
    }
}
