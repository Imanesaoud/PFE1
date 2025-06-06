<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model
{
    use HasFactory;

    protected $table = 'rendeyzvous';

    public function medecin(){
        return $this->belongsToMany(Medecin::class, 'rendeyzvous', 'medecin_id', 'patient_id')
        ->withPivot('date_heure', 'statut');
    }
    
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
}
