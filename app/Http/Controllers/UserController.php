<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showMedecins()
{
    $medecins = Medecin::all();
    return view('admin', compact('medecins'));
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
        if ($request->has('role') && $request->role == 'medecin') {
            $request->validate([
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'email' => 'required|email',
                'mote_de_passe' => 'required',
                'ville' => 'required',
                'spacialitee' => 'required|string',
                'diplome' => 'required|file|mimes:pdf',
                'experience' => 'required|string',
                'photo' => 'required|file|mimes:jpg,png,jpeg',
            ]);

            $medcin = new Medecin();
            $medcin->nom = $request->nom;
            $medcin->prenom = $request->prenom;
            $medcin->email = $request->email;
            $medcin->mote_de_passe =Hash::make($request->mote_de_passe);
            $medcin->spacialitee = $request->spacialitee;
            $medcin->ville= $request->ville;
            $medcin->diplome = $request->diplome;
            $medcin->photo = $request->photo;
            $medcin->experience = $request->experience;
            $medcin->save();
            return redirect()->route('accueil')->with('success', 'message envoyee avec succès');
        }
      
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
 
    public function editMedecin($id)
{
    $medecin =Medecin::findOrFail($id);
    return view('admin.editMedecin', compact('medecin'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $medecin =Medecin::findOrFail($id);
    
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

   
public function destroyMedecin($id){
    $medecin =Medecin::findOrFail($id);
    $medecin->delete();

    return redirect()->route('admin')->with('success', 'Médecin supprimé avec succès.');
}

}
