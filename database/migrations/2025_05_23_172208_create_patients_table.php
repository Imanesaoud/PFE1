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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("prenom");
            $table->string("cin");
            $table->string("email")->unique();
            $table->string("photo")->nullable()->default('default.png');
            $table->enum('genre', ['F', 'M']);
            $table->string("mote_de_passe");
            $table->date("date_de_naissance");
            $table->string("ville");
            // $table->foreignId('medecin_id')->constrained('medecins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
