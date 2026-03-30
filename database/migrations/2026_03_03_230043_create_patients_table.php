<?php
// database/migrations/2024_01_01_000002_create_patients_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('numero_dossier')->unique();   // Ex: FZ-001
            $table->string('nom_prenom');
            $table->date('date_naissance')->nullable();
            $table->integer('age');
            $table->enum('sexe', ['M', 'F']);
            $table->string('adresse')->nullable();
            $table->enum('provenance', ['Urbaine', 'Rurale']);
            $table->boolean('migrant')->default(false);
            $table->string('telephone')->nullable();
            $table->string('cin')->nullable()->unique();
            $table->text('antecedents')->nullable();       // Antécédents médicaux
            $table->text('allergies')->nullable();
            $table->json('pathologies_chroniques')->nullable(); // ["HTA","Diabète"]
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};