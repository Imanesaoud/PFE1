<?php

namespace App\Http\Controllers;

use App\Models\Rendezvous;
use Illuminate\Http\Request;

class MedecinController extends Controller
{
    public function index()
    {
        $listR = Rendezvous::where('medecin_id', auth()->guard('medecin')->user()->id)->get();
        // dd($listR);
        return view('medecin.index', ["listR" => $listR]);
    }

    public function validerRendezvous($id)
    {
        $validated = Rendezvous::where('medecin_id', auth()->guard('medecin')->user()->id)
            ->where('patient_id', $id)
            ->update(['statut' => 'confirmer']);

        if (!$validated) {
            return redirect()->back()->with('error', 'Patient non confirmer');
        }
        return redirect()->back()->with('success', 'Rendezvous confirmer');
    }

    public function AnnulerRendezvous($id)
    {
        $validated = Rendezvous::where('medecin_id', auth()->guard('medecin')->user()->id)
            ->where('patient_id', $id)
            ->update(['statut' => 'annuler']);

        if (!$validated) {
            return redirect()->back()->with('error', 'Patient non Annuler');
        }
        return redirect()->back()->with('success', 'Rendezvous Annuler');
    }

    public function SupprimerRendezvous($id)
    {
        $deleted = Rendezvous::where('medecin_id', auth()->guard('medecin')->user()->id)
            ->where('patient_id', $id)->first()->delete();

        if (!$deleted) {
            return redirect()->back()->with('error', 'Patient non Supprimer');
        }

        return redirect()->back()->with('success', "Rendezvous Supprimer");
    }
}
?>