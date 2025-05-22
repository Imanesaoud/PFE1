<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfilMedecinController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'medecin') {
            return view('profil-medecin', compact('user'));
        }

        return redirect()->route('home')->with('error', 'Accès refusé.');
    }
}

