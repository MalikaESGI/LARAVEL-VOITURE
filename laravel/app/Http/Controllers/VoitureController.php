<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchVoitureRequest;
use App\Models\Voiture;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    public function index(SearchVoitureRequest $request)
    {  
        $query = Voiture::query();

        if ($prix = $request->input("prix_location_journalier")) {
            $query->where('prix_location_journalier', '<=', $prix);
        }
    
        if ($nb_place = $request->input("nombre_de_place")) {
            $query->where('nombre_de_place', '>=', $nb_place);
        }
    
        if ($marque = $request->input("marque")) {
            $query->where('marque', 'like', "%$marque%");
        }
    
        if ($model = $request->input("model")) {
            $query->where('model', 'like', "%$model%");
        }
    
        $voitures = $query->paginate(16);
    
        return view('voiture.index', [
            'voitures' => $voitures,
            'input' => $request->all(), 
        ]);
    }

    public function show($id)
    {
        // Récupérer les détails de la voiture avec l'identifiant $id et passer ces détails à la vue
        $voiture = Voiture::findOrFail($id);
        return view('voiture.show', ['voiture' => $voiture]);
    }
}
