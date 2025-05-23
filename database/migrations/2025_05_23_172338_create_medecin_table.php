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
        Schema::create('medecin', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("email");
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
            $table->string("experiance");
            $table->string("description");
            $table->string("diplome");
            $table->string("photo");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medecin');
    }
};
