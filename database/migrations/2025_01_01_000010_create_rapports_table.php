<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rapports', function (Blueprint $table) {
            $table->id();
            $table->string('mois', 20);
            $table->integer('nb_consultations')->default(0);
            $table->integer('nb_patients')->default(0);
            $table->integer('nb_vaccinations')->default(0);
            $table->integer('nb_chroniques')->default(0);
            $table->integer('nb_femmes_enceintes')->default(0);
            $table->text('observations')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rapports');
    }
};