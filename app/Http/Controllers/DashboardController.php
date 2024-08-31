<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer tous les événements
        $events = Event::all();

        // Passer les événements à la vue
        return view('dashboard', compact('events'));
    }
}
