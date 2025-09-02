<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Rendezvous;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Adapter\PDFLib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    public function index()
    {
        $Rendezvous = Rendezvous::where('patient_id', auth()->guard('patient')->user()->id)->get();
        $ListR = DB::table('medecins')
            ->join('rendeyzvous', 'medecins.id', '=', 'rendeyzvous.medecin_id')
            ->where('rendeyzvous.patient_id', auth()->guard('patient')->user()->id)
            ->select('medecins.*', 'rendeyzvous.*')->get();

        return view('patient.index', compact('ListR', 'Rendezvous'));
    }
    public function telechargerPDF($id)
    {
        $medecin = Medecin::findOrFail($id);
        $rendezvous = $medecin->rendezvous()->where('patient_id', auth()->guard('patient')->user()->id)->first();
       
       
        $pdf = Pdf::loadView('patient.rendezvousValider', ['medecin' => $medecin, 'rendezvous' => $rendezvous]);
        return $pdf->download('rendezvous_' . now() . '.pdf');
    }
}
