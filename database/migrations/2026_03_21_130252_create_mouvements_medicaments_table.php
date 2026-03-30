<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mouvements_medicaments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medicament_id')->constrained('medicaments')->onDelete('cascade');
            $table->enum('type', ['entree', 'sortie', 'transfert'])->default('entree');
            $table->integer('quantite');
            $table->decimal('prix_unitaire', 10, 2)->default(0);
            $table->string('fournisseur')->nullable();
            $table->string('num_bon')->nullable();
            $table->string('responsable')->nullable();
            $table->date('date_peremption')->nullable();
            $table->string('motif')->nullable();
            $table->date('date_mouvement');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mouvements_medicaments');
    }
};