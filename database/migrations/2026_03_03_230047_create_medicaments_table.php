<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medicaments', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('dci')->nullable();
            $table->string('categorie')->nullable();
            $table->string('forme')->nullable();
            $table->decimal('prix', 10, 2)->default(0);
            $table->integer('unites_boite')->default(1);
            $table->integer('quantite')->default(0);
            $table->integer('seuil_alerte')->default(5);
            $table->string('fournisseur')->nullable();
            $table->string('code')->nullable();
            $table->date('date_peremption')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medicaments');
    }
};
