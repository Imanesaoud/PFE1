<?php

use App\Http\Controllers\ProfilMedecinController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RendezVousController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('accueil');
});
Route::get('/rendezvous', [RendezVousController::class, 'create'])->name('rendezvous.create');
Route::post('/rendezvous', [RendezVousController::class, 'store'])->name('rendezvous.store');
Route::get('/success', [RendezVousController::class, 'success'])->name('rendezvous.success');

Route::get('/profil/{id}', [ProfilMedecinController::class, 'show'])->name('profil.medecin');

