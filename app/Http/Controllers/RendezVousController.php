<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller; 

use Illuminate\Http\Request;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
class RendezVousController extends Controller
{
    public function create() {
        return view('rendezvous');
    }

    public function store(Request $request)
{
    $user =UserInfo::create([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role,
        'photo' => $request->file('photo')?->store('photos', 'public'),
        'diplome' => $request->file('diplome')?->store('diplomes', 'public'),
        'horaires' => $request->horaires,
        'experience' => $request->experience,
    ]);

    if ($user->role === 'medecin') {
        return redirect()->route('profil', $user->id);
    }

    return redirect()->route('rendezvous')->with('success', 'Inscription réussie');
}

    public function success() {
        $user = UserInfo::latest()->first();
        return view('success', compact('user'));
    }
}
