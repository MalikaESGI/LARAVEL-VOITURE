<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Toggle the favorite status of a voiture for the authenticated user.
     */
    public function toggleFavorite(Request $request)
    {
        // Validation de la requête
        $request->validate([
            'voiture_id' => 'required|integer'
        ]);

        $userId = Auth::id(); // Obtenez l'ID de l'utilisateur authentifié
        $voitureId = $request->voiture_id; // ID de la voiture à toggle

        $user = Auth::user(); // Obtenez l'utilisateur authentifié

        // Vérifiez si la voiture est déjà dans les favoris
        $isFavorite = $user->voituresFavorites()->where('voiture_id', $voitureId)->exists();

        if ($isFavorite) {
            // Si elle est en favoris, la retirer
            $user->voituresFavorites()->detach($voitureId);
            return response()->json(['status' => 'removed', 'message' => 'Voiture retirée des favoris!']);
        } else {
            // Si elle n'est pas en favoris, l'ajouter
            $user->voituresFavorites()->attach($voitureId);
            return response()->json(['status' => 'added', 'message' => 'Voiture ajoutée aux favoris!']);
        }
    }

    /**
     * Display a listing of the favorites for the authenticated user.
     */
    public function showFavorites()
    {
        $userId = Auth::id(); // Obtenez l'ID de l'utilisateur authentifié
        // Récupérez les favoris avec les données de voiture associées
        $favorites = Favorite::with('voiture')->where('user_id', $userId)->get();

        // Renvoyez la vue avec les favoris
        return view('favorites.index', ['favorites' => $favorites]);
    }
}
