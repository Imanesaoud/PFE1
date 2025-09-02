<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Patient extends Authenticatable
{
    use HasFactory;

    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }
    public function medecin(){
        return $this->belongsTo(Medecin::class);
    }

    public function rendezvous(){
        return $this->hasMany(Rendezvous::class);
    }
}
