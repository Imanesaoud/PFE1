<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Medium;


class AdminController extends Controller{

public function showMedecins()
{
    $medecins = Medecin::all();
    return view('admin', compact('medecins'));
}


    public function editMedecin($id)
{
    $medecin =Medecin::findOrFail($id);
    return view('admin.editMedecin', compact('medecin'));
}

public function updateMedecin(Request $request, $id)
{
    $medecin =Medecin::findOrFail($id);
    
    $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'email' => 'required|email',
        'horaires' => 'nullable|string',
        'experience' => 'nullable|string',
    ]);

    $medecin->update($request->only(['nom', 'prenom', 'email', 'horaires', 'experience']));

    return redirect()->route('admin.liste')->with('success', 'Médecin modifié avec succès.');
}

public function destroyMedecin($id)
{
    $medecin =Medecin::findOrFail($id);
    $medecin->delete();

    return redirect()->route('admin.liste')->with('success', 'Médecin supprimé avec succès.');
}

}
