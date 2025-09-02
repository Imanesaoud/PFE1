<?php

namespace App\Http\Controllers;

use App\Models\Admin;
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
        Auth::guard('patient')->login($patient);
        return redirect()->route('patient.index');
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
            Auth::guard('medecin')->login($medecin); 
          return redirect()->route('medecin.index');  
        } 

        return redirect()->back()->with('error','mote de passe ou email incorrect');
    }
    public function deconnexion()
    {
        Auth::guard('medecin')->logout();
        return redirect()->route('accueil');
    }
    public function loginAdmin(Request $request){
                $request->validate([
            'email' => 'required|email|exists:admins,email',
            'mode_de_passe' => 'required'
        ]);

        $credentials = $request->only('email', 'mode_de_passe');
        $admin= Admin::where('email', $credentials['email'])->first();

        if ($admin && Hash::check($credentials['mode_de_passe'], $admin->mode_de_passe)) {
            Auth::guard('admin')->login($admin);
          return redirect()->route('admin');  
        } 

        return redirect()->back()->with('error','mote de passe ou email incorrect');

    }

    public function Admindeconnexion(){
           Auth::guard('admin')->logout();
        return redirect()->route('accueil');

    }
    
}
