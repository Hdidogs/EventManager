<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer tous les événements
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

        // Passer les événements à la vue
        return view('dashboard', compact('events', 'placesRestantes', 'userReservations'));
    }

    public function inscrire($eventId)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $exists = Reservation::where('event_id', $eventId)
                ->where('user_id', $userId)
                ->exists();

            if (!$exists) {
                Reservation::create([
                    'event_id' => $eventId,
                    'user_id' => $userId,
                ]);
            }
        }

        return redirect()->back();
    }

    public function desinscrire($eventId)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            Reservation::where('event_id', $eventId)
                ->where('user_id', $userId)
                ->delete();
        }

        return redirect()->back();
    }
}
