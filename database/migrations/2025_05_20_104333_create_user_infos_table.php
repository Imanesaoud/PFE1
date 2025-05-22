<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->enum('role', ['admin', 'patient', 'medecin']);
    
            // Pour les médecins uniquement
            $table->string('diplome')->nullable();
            $table->string('horaires')->nullable();
            $table->text('experience')->nullable();
    
            $table->timestamps();
        });
    }
     

    
};
