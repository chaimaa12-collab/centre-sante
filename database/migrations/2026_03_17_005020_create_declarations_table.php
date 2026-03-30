<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       Schema::create('declarations', function (Blueprint $table) {
    $table->id(); // 🔥 IMPORTANT (clé primaire)

    $table->string('nom_agent');
    $table->string('matricule')->nullable();
    $table->string('grade')->nullable();
    $table->string('service')->nullable();
    $table->string('cin')->nullable();
    $table->string('type');
    $table->string('urgence')->default('Normal');
    $table->date('date_faits')->nullable();
    $table->date('date_decl')->nullable();
    $table->text('description')->nullable();
    $table->text('observations')->nullable();
    $table->string('declare_par')->nullable();
    $table->string('statut')->default('en_attente');

    $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('declarations');
    }
};