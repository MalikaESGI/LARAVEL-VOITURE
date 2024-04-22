<?php

namespace App\Http\Controllers;

use App\Models\Favorite; // Assurez-vous que ce chemin est correct
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Card;
class FavoriteController extends Controller
{
    public function toggleFavorite(Request $request)
    {
        $request->validate([
            'voiture_id' => 'required|integer'
        ]);

        $userId = Auth::id();
        $voitureId = $request->voiture_id;
        $favorite = Favorite::where('user_id', $userId)->where('voiture_id', $voitureId)->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['status' => 'removed', 'message' => 'Voiture retirée des favoris!']);
        } else {
            Favorite::create([
                'user_id' => $userId,
                'voiture_id' => $voitureId,
            ]);
            return response()->json(['status' => 'added', 'message' => 'Voiture ajoutée aux favoris!']);
        }
    }

    
    public function showFavorites()
{
    $userId = Auth::id();
    $favorites = Favorite::with('voiture')->where('user_id', $userId)->get();

    return view('favorites.index', ['favorites' => $favorites]);
}

}
