<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('medicaments', function (Blueprint $table) {
            $table->string('nom')->after('id');
            $table->string('dci')->nullable()->after('nom');
            $table->string('categorie')->nullable()->after('dci');
            $table->string('forme')->nullable()->after('categorie');
            $table->decimal('prix', 10, 2)->default(0)->after('forme');
            $table->integer('unites_boite')->default(1)->after('prix');
            $table->integer('quantite')->default(0)->after('unites_boite');
            $table->integer('seuil_alerte')->default(5)->after('quantite');
            $table->string('fournisseur')->nullable()->after('seuil_alerte');
            $table->string('code')->nullable()->after('fournisseur');
            $table->date('date_peremption')->nullable()->after('code');
        });
    }

    public function down(): void
    {
        Schema::table('medicaments', function (Blueprint $table) {
            $table->dropColumn(['nom','dci','categorie','forme','prix',
                'unites_boite','quantite','seuil_alerte','fournisseur',
                'code','date_peremption']);
        });
    }
};