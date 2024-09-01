<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventListController;
use App\Http\Controllers\GestionEventController;
use App\Http\Controllers\PanelAdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::post('/inscrire/{eventId}', [DashboardController::class, 'inscrire'])->name('events.inscrire');
Route::post('/desinscrire/{eventId}', [DashboardController::class, 'desinscrire'])->name('events.desinscrire');
Route::post('/desinscrirelist/{eventId}', [EventListController::class, 'desinscrire'])->name('events.desinscrire');

Route::resource('events', EventController::class);
Route::put('/edit', [EventController::class, 'update'])->name('event.edit');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::delete('/events/{event}/desinscrire', [EventListController::class, 'desinscrire'])->name('events.desinscrire');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/gestionevent', [GestionEventController::class, 'index'])->name('event.gestionevent');
    Route::get('/admin', [PanelAdminController::class, 'index'])->name('admin.paneladmin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/paneladmin', [PanelAdminController::class, 'panelAdmin'])->name('admin.panelAdmin');

    // Routes pour la gestion des admins et organisateurs (déjà ajoutées précédemment)
    Route::patch('/admin/add-admin/{user}', [PanelAdminController::class, 'addAdmin'])->name('admin.addAdmin');
    Route::patch('/admin/remove-admin/{user}', [PanelAdminController::class, 'removeAdmin'])->name('admin.removeAdmin');
    Route::patch('/admin/add-organisateur/{user}', [PanelAdminController::class, 'addOrganisateur'])->name('admin.addOrganisateur');
    Route::patch('/admin/remove-organisateur/{user}', [PanelAdminController::class, 'removeOrganisateur'])->name('admin.removeOrganisateur');
});

Route::get('/admin/add-admin', [PanelAdminController::class, 'showAddAdminForm'])->name('admin.addAdminForm');
Route::post('/admin/add-admin', [PanelAdminController::class, 'addAdmin'])->name('admin.addAdmin');

Route::get('/admin/add-organisateur', [PanelAdminController::class, 'showAddOrganisateurForm'])->name('admin.addOrganisateurForm');
Route::post('/admin/add-organisateur', [PanelAdminController::class, 'addOrganisateur'])->name('admin.addOrganisateur');


Route::middleware('auth')->group(function () {
    Route::get('/event', [GestionEventController::class, 'index'])->name('event.gestionevent');
    Route::get('/event/{event}/edit', [GestionEventController::class, 'edit'])->name('event.edit');
    Route::put('/event/{event}', [GestionEventController::class, 'update'])->name('event.update');
    Route::delete('/event/{event}', [GestionEventController::class, 'destroy'])->name('event.destroy');
});

require __DIR__.'/auth.php';
