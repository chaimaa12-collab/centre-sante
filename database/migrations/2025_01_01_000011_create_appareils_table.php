<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('appareils', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100);
            $table->string('type', 50);
            $table->string('marque', 100);
            $table->string('numero_serie', 100)->unique();
            $table->string('salle', 100);
            $table->enum('statut', ['operationnel', 'maintenance', 'hors_service'])->default('operationnel');
            $table->date('derniere_maintenance')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appareils');
    }
};