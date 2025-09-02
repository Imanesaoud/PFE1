<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfilMedecinController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\UserController;
use App\Models\Medecin;
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
Route::get('/medcin/{id}',[UserController::class ,'profilMed'])->name('voir.medcin');

Route::get('/patient/ajouter/{id}', [UserController::class, 'showPatientForm'])->name('ajouter.patient');
Route::post('/patient/store', [UserController::class, 'AjouterPatient'])->name('store.patient');

Route::view('/login/medecin','loginMed')->name('login.med');
Route::view('/login/patient','loginPatien')->name('login.patient');

Route::post('/patient/login', [AuthController::class, 'loginPatient'])->name('patient.login');
Route::post('/medecin/login', [AuthController::class, 'loginMedecin'])->name('medecin.login');
Route::get('medecin/index',[MedecinController::class, 'index'   ])->name('medecin.index');

Route::get('/medecin/valider/{id}', [MedecinController::class, 'validerRendezvous'])->name('medecin.valider.rendezvous');
Route::get('/medecin/anuller/{id}', [MedecinController::class, 'AnnulerRendezvous'])->name('medecin.annuler.rendezvous');
Route::delete('/medecin/supprimer/{id}', [MedecinController::class, 'SupprimerRendezvous'])->name('medecin.supprimer.rendezvous');

Route::view('/medecin/profile', 'medecin.profil')->name('medecin.profil');
Route::get('/a-propos', function () {
    return view('about'); // Assurez-vous que le fichier est resources/views/about_us.blade.php
})->name('about.us'); // Le nom de la route utilisé dans votre navbar
Route::get('/contact', function () {
    return view('contact'); // Looks for resources/views/contact.blade.php
})->name('contact.us');
Route::put('/medecin/modifier',[MedecinController::class ,'update'])->name('medecin.update');

Route::post('medecin/deconnexion',[AuthController::class, 'deconnexion'])->name('medecin.deconnexion');
Route::get('patient/index' ,[PatientController::class,'index'])->name('patient.index');
Route::post('patient/deconnexion',[AuthController::class, 'deconnexion'])->name('patient.deconnexion');

Route::get('/inscription/{id}/telecharger', [PatientController::class, 'telechargerPDF'])->name('telechargerPDF');

Route::post('/admin/login', [AuthController::class, 'loginAdmin'])->name('auth.admin');
Route::view('/login/admin','admin.login')->name('admin.login');
Route::post('admin/deconnexion',[AuthController::class, 'Admindeconnexion'])->name('admin.deconnexion');