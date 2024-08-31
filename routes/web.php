<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Event Routes
Route::get('/createevent', function () {
    $user = Auth::user();
    if (!$user || !in_array($user->role_id, [1, 2])) {
        return redirect('/dashboard')->with('error', 'Vous n\'avez pas accès à cette page.');
    }
    return view('event.create');
})->middleware(['auth', 'verified'])->name('event.create');
Route::post('/inscrire/{eventId}', [DashboardController::class, 'inscrire'])->name('events.inscrire');
Route::post('/desinscrire/{eventId}', [DashboardController::class, 'desinscrire'])->name('events.desinscrire');

Route::resource('events', EventController::class);

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
