<?php

namespace App\Http\Controllers;

use App\Models\Utilisateurs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ApiUsersControllers extends Controller
{
    public function postLoginUser(Request $request)
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
                'message' => $validator->errors(),
            ], 422);
        }

        $user = Utilisateurs::where('phone_user', $request->login)
        ->orWhere('email_user', $request->login)
        ->where('password_user', $request->password)
        ->first();
        if ($user) {

            return response()->json([
                'identifiant' => $user->id_user,
                'nom' => $user->nom_user,
                'prenom' => $user->prenom_user,
                'phone' => $user->phone_user,
                'email' => $user->email_user ?? "",
                'photo' => $user->photo_user == null ? "" : asset('utilisateurs') . '/' . $user->photo_user ?? "",
            ], 200);
        } else {

            return response()->json([
                'message' => "Vous n'avez pas de compte. Veuillez en créer"
            ], 401);
        }
    }

    public function postCreateUser(Request $request)
    {
        if (empty($request->nom)) {
            return response()->json([
                'message' => 'Votre nom est obligatoire.',
            ], 422);
        }
        if (empty($request->prenom)) {
            return response()->json([
                'message' => 'Votre prénom est obligatoire.',
            ], 422);
        }
        if (empty($request->tel)) {
            return response()->json([
                'message' => 'Votre numéro de téléphone est obligatoire.',
            ], 422);
        }
        if (empty($request->password)) {
            return response()->json([
                'message' => 'Votre mot de passe est obligatoire.',
            ], 422);
        }
        if (empty($request->commune)) {
            return response()->json([
                'message' => 'Votre commune est obligatoire.',
            ], 422);
        }

        $user = Utilisateurs::where('phone_user', $request->tel)->first();
        if ($user) {
            return response()->json([
                'message' => "Le numéro de téléphone existe déjà."
            ], 422);
        }

        if (!empty($request->email)) {
            $user = Utilisateurs::where('email_user', $request->email)->first();
            if ($user) {
                return response()->json([
                    'message' => "L'adresse e-mail existe déjà."
                ], 422);
            }
        }

        $utilisateur = new Utilisateurs();
        $utilisateur->id_user = Str::uuid();
        $utilisateur->nom_user = $request->nom;
        $utilisateur->prenom_user = $request->prenom;
        $utilisateur->phone_user = $request->tel;
        $utilisateur->email_user = $request->email ?? "";
        $utilisateur->commune_user = $request->commune;
        $utilisateur->password_user = Hash::make($request->password);

        if ($utilisateur->save()) {
            return response()->json([
                'message' => "Votre compte a été créé avec succès"
            ], 200);
        } else {
            return response()->json([
                'message' => "Problème lors de la création de votre compte. Veuillez réessayer!",
            ], 401);
        }
    }

    public function postPhotoUser(Request $request)
    {

        $galeries = $request->file('photo');
        if (is_array($galeries)) {
            foreach ($galeries as $file) {
                $fileNameWithExtension = $file->getClientOriginalName();

                $imageName = 'photo_user_' . time() . '_' . '.' . $fileNameWithExtension;

                $file->move(public_path('/utilisateurs'), $imageName);

                Utilisateurs::where('id_user', $request->identifiant)
                    ->update([
                        'photo_user' => $imageName,
                    ]);

                return response()->json([
                    'message' => "Votre photo a été ajouté.",
                ], 200);
            }
        } else {
            $fileNameWithExtension = $galeries->getClientOriginalName();
            $imageName = 'photo_user_' . time() . '_' . '.' . $fileNameWithExtension;

            $galeries->move(public_path('/utilisateurs'), $imageName);

            Utilisateurs::where('id_user', $request->identifiant)
                ->update([
                    'photo_user' => $imageName,
                ]);

            return response()->json([
                'message' => "Votre photo a été ajouté.",
            ], 200);
        }
    }

    public function postAddEmailUser(Request $request)
    {
        if (empty($request->email)) {
            return response()->json([
                'message' => 'Votre adresse e-mail est obligatoire.',
            ], 422);
        }

        $user = Utilisateurs::where('email_user', $request->email)->first();
        if ($user) {
            return response()->json([
                'message' => "L'adresse e-mail est déjà utilisé. Veuillez essayer un autre."
            ], 422);
        }

        Utilisateurs::where('id_user', $request->identifiant)
            ->update([
                'email_user' => $request->email,
            ]);

        return response()->json([
            'message' => "Votre adresse e-mail a été ajouté.",
        ], 200);
    }
}
