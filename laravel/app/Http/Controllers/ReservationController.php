<?php

namespace App\Http\Controllers;


use Carbon\Carbon;


use App\Models\User;
use App\Models\Voiture;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function index()
    {
        $user = Auth::user();

    // Récupérer les réservations de l'utilisateur authentifié
    $reservations = $user->reservations()->paginate(10);
        return view('reservations.index', [
            'reservations'=> $reservations
        ]);

    }


    public function create($voiture_id)
    {
        if ($voiture_id) {
            // Trouve la voiture spécifique par son ID ou échoue avec une erreur 404
            $voitures = Voiture::findOrFail($voiture_id);
        }
        return view('reservations.create', [
            'voitures'=> $voitures
        ]);
    }

    public function store(Request $request)
    {
    //     $request->validate([
    //         'voiture_id' => 'required',
    //         'date_de_debut' => 'required|date',
    //         'date_de_fin' => 'required|date|after:date_de_debut'
    //     ]);

    //     Reservation::create($request->all());

    //     return redirect()->route('home')->with('success', 'Réservation effectuée avec succès!');
    // }


    $request->validate([
        'voiture_id' => 'required|exists:voitures,id',
        'date_de_debut' => 'required|date',
        'date_de_fin' => 'required|date|after_or_equal:date_de_debut'
    ]);

    $voiture = Voiture::findOrFail($request->voiture_id);
    $dateDebut = new Carbon($request->date_de_debut);
    $dateFin = new Carbon($request->date_de_fin);
    $duree = $dateDebut->diffInDays($dateFin) + 1; // +1 pour inclure le jour de début

    // Calculer le prix
    $prix = $duree * $voiture->prix_location_journalier;

    $reservation = new Reservation([
        'user_id' => auth()->id(), 
        'voiture_id' => $request->voiture_id,
        'date_de_debut' => $request->date_de_debut,
        'date_de_fin' => $request->date_de_fin,
        'prix' => $prix,
    ]);
    $voiture->reserver =  true;
    $voiture->save();
    $reservation->save();

    return redirect()->route('reservation.index')->with('success', 'Réservation effectuée avec succès !');
}

}
