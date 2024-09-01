<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventListController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $reservations = Reservation::where('user_id', $userId)->with('event')->get();

        return view('profile.partials.eventlist', compact('reservations'));
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
