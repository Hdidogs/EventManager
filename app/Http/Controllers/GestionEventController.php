<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GestionEventController extends Controller
{
    // Afficher tous les événements
    public function index()
    {
        $events = Event::all();
        return view('event.gestionevent', compact('events'));
    }

    // Afficher le formulaire de modification pour un événement
    public function edit(Event $event)
    {
        return view('event.edit', compact('event'));
    }

    // Mettre à jour un événement
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'nombre_de_places' => 'required|integer|min:1',
        ]);

        $event->update($request->all());

        $events = Event::all();

        // Créer un tableau pour stocker les places restantes
        $placesRestantes = [];
        $userReservations = [];

        foreach ($events as $event) {
            // Calculer les places restantes
            $reservationsCount = Reservation::where('event_id', $event->id)->count();
            $placesRestantes[$event->id] = $event->nombre_de_places - $reservationsCount;

            // Vérifier si l'utilisateur est inscrit à cet événement
            if (Auth::check()) {
                $userReservations[$event->id] = Reservation::where('event_id', $event->id)
                    ->where('user_id', Auth::id())
                    ->exists();
            } else {
                $userReservations[$event->id] = false;
            }
        }

        return redirect()->route('event.gestionevent', compact('events', 'userReservations', 'placesRestantes'))->with('status', 'Événement mis à jour avec succès!');
    }

    // Supprimer un événement
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('event.gestionevent')->with('status', 'Événement supprimé avec succès!');
    }
}
