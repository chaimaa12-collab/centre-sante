<?php
// database/migrations/2024_01_01_000003_create_consultations_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();

            // Relations
            $table->foreignId('patient_id')
                  ->constrained('patients')
                  ->onDelete('cascade');
            $table->foreignId('medecin_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Infos registre papier
            $table->date('date');
            $table->integer('numero_ordre');
            $table->enum('type_consultation', ['premiere', 'deuxieme'])->default('premiere');
            $table->string('motif');

            // Signes vitaux
            $table->string('tension')->nullable();       // Ex: "120/80"
            $table->decimal('temperature', 4, 1)->nullable();
            $table->integer('pouls')->nullable();
            $table->decimal('poids', 5, 1)->nullable();
            $table->decimal('taille', 5, 1)->nullable();

            // Orientation médicale
            $table->enum('orientation_medicale', [
                'Aucune', 'Urgences', 'Spécialiste', 'Bilan'
            ])->default('Aucune');

            // Pathologies cochées (registre papier)
            $table->json('pathologies')->nullable();

            // Notes
            $table->text('notes')->nullable();
            $table->boolean('certificat_medical')->default(false);
            $table->boolean('arret_travail')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};