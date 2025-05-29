<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilMedecinController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\UserController;
use App\Models\User;

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
})->name('accueil');
Route::post('/rendezvous', [UserController::class, 'store'])->name('rendezvous.store');
Route::get('/success', [RendezVousController::class, 'success'])->name('rendezvous.success');
Route::get('/ajouter', [RendezVousController::class, 'create'])->name('ajouter');
// Route::get('/profil/{id}', [ProfilMedecinController::class, 'show'])->name('profil.medecin');





Route::get('/admin', [UserController::class, 'showMedecins'])->name('admin');
Route::get('/admin/{id}', [UserController::class, 'validerMedecin'])->name('admin.edit');
Route::get('/admin/refuse/{id}', [UserController::class, 'refuseMedecin'])->name('admin.refuse');
// Route::put('/admin/{id}', [UserController::class, 'updateMedecin'])->name('admin.update');
Route::delete('/admin/destroy/{id}', [UserController::class, 'destroyMedecin'])->name('admin.destroy');

Route::get('show/medecins', [UserController::class, 'index'])->name('show.medeciens');
