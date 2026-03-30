<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'actif')) {
                $table->boolean('actif')->default(true)->after('remember_token');
            }
            if (!Schema::hasColumn('users', 'role')) {
                $table->enum('role', [
                    'admin',
                    'medecin_chef',
                    'medecin_generaliste',
                    'infirmiere_smi',
                    'service_chroniques',
                ])->default('infirmiere_smi')->after('password');
            }
            if (!Schema::hasColumn('users', 'derniere_connexion')) {
                $table->timestamp('derniere_connexion')->nullable()->after('actif');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['actif', 'derniere_connexion']);
        });
    }
};