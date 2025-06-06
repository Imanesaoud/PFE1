<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   public function loginPatient(Request $request){
    $request->validate([
        'email' => 'required|email|exists:patients,email',
        'mote_de_passe' => 'required'
    ]);

    $credentials = $request->only('email', 'mote_de_passe');
    $patient = Patient::where('email', $credentials['email'])->first();

    if ($patient && Hash::check($credentials['mote_de_passe'], $patient->mote_de_passe)) {
        Auth::login($patient);
     }else{
            return redirect()->back()->with('error', 'Address email ou le mote de passe incorrect');
        }
    
    }

    public function loginMedecin(Request $request){
        $request->validate([
            'email' => 'required|email|exists:medecins,email',
            'mote_de_passe' => 'required'
        ]);

        $credentials = $request->only('email', 'mote_de_passe');
        $medecin = Medecin::where('email', $credentials['email'])->first();

        if ($medecin && Hash::check($credentials['mote_de_passe'], $medecin->mote_de_passe)) {
            Auth::guard('medecin')->login($medecin); // Specify the guard here
            return view('medecin.index');
        } 

        return redirect()->route('medecin.index');
    }
}
