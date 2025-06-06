<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $query=Medecin::query();
        if($request->has('ville')){
            $query->where('ville',$request->ville);

        }
          if($request->has('spacialitee')){
            $query->where('spacialitee',$request->spacialitee);

        }


       $villes = Medecin::where('status', 'valider')->pluck('ville')->unique();
       $spacialitee=Medecin::where('status', 'valider')->pluck('spacialitee')->unique();
        $medecins =$query->where('status', 'valider')->get();
        return view('medeciens', compact('medecins' ,'villes','spacialitee'));


    }

    public function showPatientForm($id)
    {
        $medecin = Medecin::findOrFail($id);
        if(!$medecin) return redirect('accueil');
        return view('AjouterPatient', compact('medecin'));
    }

    public function AjouterPatient(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'cin' => 'required|string',
            'email' => 'required|email|unique:patients,email',
            'mote_de_passe' => 'required',
            'ville' => 'required',
            'photo' => 'file|mimes:jpg,png,jpeg,webp',
            'genre' => 'required|in:H,F'
        ]);

        $patient = new Patient();

        if ($request->hasFile('photo')) {
            $patient->photo = Storage::put('photos', $request->photo);
        }

        $patient->nom = $request->nom;
        $patient->prenom = $request->prenom;
        $patient->cin = $request->cin;
        $patient->email = $request->email;
        $patient->mote_de_passe = Hash::make($request->mote_de_passe);
        $patient->date_de_naissance = $request->date_de_naissance;
        $patient->ville = $request->ville;
        $patient->genre = $request->genre;
        $patient->save();

        DB::table('rendeyzvous')->insert([
            'date_heure' => now(),
            'patient_id' => $patient->id,
            'medecin_id' => $request->medecin_id
        ]);
        
        return redirect()->route('accueil')->with('success', 'message envoyee avec succès');
    }

    public function showMedecins()
    {
        $medecins = Medecin::all();
        return view('admin.admin', compact('medecins'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:medecins,email',
            'mote_de_passe' => 'required',
            'ville' => 'required',
            'spacialitee' => 'required|string',
            'diplome' => 'required|file|mimes:pdf',
            'experience' => 'required|string',
            'photo' => 'file|mimes:jpg,png,jpeg,webp',
        ]);

        $medcin = new Medecin();

        if ($request->hasFile('diplome')) {
            $medcin->diplome = Storage::put('diplomes', $request->diplome);
        }

        if ($request->hasFile('photo')) {
            $medcin->photo = Storage::put('photos', $request->photo);
        }

        $medcin->nom = $request->nom;
        $medcin->prenom = $request->prenom;
        $medcin->email = $request->email;
        $medcin->mote_de_passe = Hash::make($request->mote_de_passe);
        $medcin->spacialitee = $request->spacialitee;
        $medcin->ville = $request->ville;
        $medcin->experience = $request->experience;
        $medcin->save();
        return redirect()->route('accueil')->with('success', 'message envoyee avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $medecins = Medecin::all();
        return view('admin', compact('medecins'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function validerMedecin($id)
    {
        $medecin = Medecin::findOrFail($id);
        $medecin->status = 'valider';
        $medecin->save();
        return redirect()->back()->with('success', 'Médecin Validé avec succès.');
    }

    public function refuseMedecin($id)
    {
        $medecin = Medecin::findOrFail($id);
        $medecin->status = 'refuser';
        $medecin->save();
        return redirect()->back()->with('danger', 'Médecin Refusé avec succès.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $medecin = Medecin::findOrFail($id);

        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email',
            'horaire' => 'nullable|string',
            'experience' => 'nullable|string',
        ]);

        $medecin->update($request->only(['nom', 'prenom', 'email', 'horaires', 'experience']));
        return redirect()->route('admin')->with('success', 'Médecin modifié avec succès.');
    }


    public function destroyMedecin($id)
    {
        $medecin = Medecin::findOrFail($id);
        $medecin->delete();

        return redirect()->route('admin')->with('success', 'Médecin supprimé avec succès.');
    }
    public function profilMed($id){
        $medecin = Medecin::findOrFail($id);
        return view('profilMedcin',compact('medecin'));

    }
}
