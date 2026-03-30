<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('appareils', 'quantite')) {
            Schema::table('appareils', function (Blueprint $table) {
                $table->integer('quantite')->default(1)->after('salle');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('appareils', 'quantite')) {
            Schema::table('appareils', function (Blueprint $table) {
                $table->dropColumn('quantite');
            });
        }
    }
};