<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medecin extends Authenticatable
{
    use HasFactory;

    public $table = 'medecins';
    
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }
    public function patients(){
        return $this->hasMany(Patient::class);
    }

    public function rendezvous(){
        return $this->hasMany(Rendezvous::class);
    }
}