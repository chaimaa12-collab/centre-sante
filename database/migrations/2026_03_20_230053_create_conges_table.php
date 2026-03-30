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
 
    Schema::create('conges', function (Blueprint $table) {
        $table->id();
        $table->string('nom_agent');
        $table->string('matricule')->nullable();
        $table->string('grade')->nullable();
        $table->string('service')->nullable();
        $table->string('type');
        $table->date('date_debut');
        $table->date('date_fin');
        $table->integer('nb_jours')->nullable();
        $table->string('remplacant')->nullable();
        $table->text('observations')->nullable();
        $table->string('statut')->default('en_attente');
        $table->string('valide_par')->nullable();
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conges');
    }
};
