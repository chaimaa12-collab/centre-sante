<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('patients', function (Blueprint $table) {
            if (!Schema::hasColumn('patients', 'sexe'))              $table->enum('sexe', ['M','F'])->nullable();
            if (!Schema::hasColumn('patients', 'cin'))               $table->string('cin', 20)->nullable()->unique();
            if (!Schema::hasColumn('patients', 'telephone'))         $table->string('telephone', 20)->nullable();
            if (!Schema::hasColumn('patients', 'date_naissance'))    $table->date('date_naissance')->nullable();
            if (!Schema::hasColumn('patients', 'adresse'))           $table->string('adresse', 255)->nullable();
            if (!Schema::hasColumn('patients', 'est_enceinte'))      $table->boolean('est_enceinte')->default(false);
            if (!Schema::hasColumn('patients', 'maladie_chronique')) $table->boolean('maladie_chronique')->default(false);
            if (!Schema::hasColumn('patients', 'observations'))      $table->text('observations')->nullable();
        });
    }
    public function down(): void {}
};