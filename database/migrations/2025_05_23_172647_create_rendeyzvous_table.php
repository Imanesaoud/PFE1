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
        Schema::create('rendeyzvous', function (Blueprint $table) {
            $table->id();
            $table->datetime("date_heure");
            $table->enum("statut",['annuler','confirmer']);
            $table->foreignId("medcin_id")->constrained("medecins");
            $table->foreignId("patient_id")->constrained("patients");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendeyzvous');
    }
};
