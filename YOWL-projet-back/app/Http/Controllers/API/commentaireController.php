<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\commentaire;
use Illuminate\Http\Request;
use App\Models\User;
class commentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // On récupère tous les utilisateurs
        $commentaire = commentaire::orderBy('id', 'desc')->get();

        // On retourne les informations des utilisateurs en JSON
        return response()->json($commentaire);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // La validation de données
        
         /*return commentaire::create([
        "commentaire_lien" => 'https://trello.com/b/1TjwWGZX/projet-yowl',
        "commentaire_contenu" => 'bonjour a qui jai lhonneure',
        "image_url" => 'https://trello.com/b/1TjwWGZX/projet-yowl',
        "title_url" => 'dalutaion distinguées',
        "users_id" => '2'
        ]);*/
         
     $this->validate($request, [
        'commentaire_lien' => 'required',
        'commentaire_contenu' => 'required',
        'commentaire_like'  => 'nullable',
        'commentaire_dislike'  => 'nullable',
        'image_url' => 'nullable',
        'title_url' => 'required',
        'users_id'  => 'required'
    ]);

    // On crée un nouvel utilisateur
    $commentaire = commentaire::create([
        'commentaire_lien' => $request->commentaire_lien,
        'commentaire_contenu' => $request->commentaire_contenu,
        'commentaire_like' => $request->commentaire_like,
        'commentaire_dislike' => $request->commentaire_dislike,
        'image_url' => $request->image_url,
        'title_url' => $request->title_url,
        'users_id' => $request->users_id
    ]);

    // On retourne les informations du nouvel utilisateur en JSON
    return response()->json($commentaire, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(commentaire $commentaire)
    {
        // On retourne les informations de l'utilisateur en JSON
        return response()->json($commentaire);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, commentaire $commentaire)
    {
        // La validation de données
    $this->validate($request, [
        'commentaire_lien' => 'required',
        'commentaire_contenu' => 'required',
        'commentaire_like' => 'nullable',
        'commentaire_dislike' => 'nullable',
        'image_url' => 'nullable',
        'title_url' => 'required',
        'users_id'
    ]);

    // On modifie les informations de l'utilisateur
    $commentaire->update([
        'commentaire_lien' => $request->commentaire_lien,
        'commentaire_contenu' => $request->commentaire_contenu,
        'commentaire_like' => $request->commentaire_like,
        'commentaire_dislike' => $request->commentaire_dislike,
        'image_url' => $request->image_url,
        'title_url' => $request->title_url,
        'users_id' => $request->users_id
    ]);

    // On retourne la réponse JSON
    return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(commentaire $commentaire)
    {
        // On supprime l'utilisateur
        $commentaire->delete();

        // On retourne la réponse JSON
        return response()->json();
    }
}
