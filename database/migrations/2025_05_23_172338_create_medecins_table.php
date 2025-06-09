<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medecins', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("prenom");
            $table->string("email")->unique();
            $table->string("mote_de_passe");
            $table->enum('spacialitee', [
                'Médecine Générale',
                'Pédiatrie',
                'Gynécologie',
                'Cardiologie',
                'Dermatologie',
                'Ophtalmologie'
            ]);
            $table->string("ville");
            $table->string("experience");
            $table->string("description")->nullable();
            $table->string("diplome");
            $table->string("photo")->nullable();
            $table->string('horaires')->nullable()->default("Lundi-Vendredi: 8h-12h et 14h-18h");
            $table->enum("status", ['valider', 'encours', 'refuser'])->nullable()->default('encours');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medecins');
    }
};
