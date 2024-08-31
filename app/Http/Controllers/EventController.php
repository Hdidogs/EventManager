<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard', [
            'events' => Event::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'nombre_de_places' => ['required', 'integer'],
        ]);

        $organisateurId = Auth::id();

        $event = Event::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'date' => $request->date,
            'nombre_de_places' => $request->nombre_de_places,
            'organisateur_id' => $organisateurId,
        ]);

        event(new Registered($event));

        return redirect(route('dashboard', absolute: false));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
