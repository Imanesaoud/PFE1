<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->has('role') && $request->role=='medcin' ){
            dd('tester');
            $request->validate([
                'nom'=>'required|string',
                'email'=>'required|email',
                'mote_de_passe'=>'required|password',
                'spacialitee'=>'required|string',
                'diplome'=>'required|file|mimes:pdf',
                'experiance'=>'required|string',
                'photo'=>'required|file|mimes:jpg,png,jpeg',     
            ]);

            $medcin=new Medecin();
            $medcin->nom=$request->nom;
            $medcin->email=$request->email;
            $medcin->mote_de_passe=$request->mote_de_passe;
            $medcin->spacialitee=$request->spacialitee;
            $medcin->diplome=$request->diplome;
            $medcin->photo=$request->photo;
            $medcin->experiance=$request->experiance;
            $medcin->save();
                 return redirect('')->route('accueil')->with('success', 'message envoyee avec succès'); 
    
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
