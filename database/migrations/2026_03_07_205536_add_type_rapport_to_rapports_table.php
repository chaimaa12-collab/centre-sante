<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('rapports', function (Blueprint $table) {
            if (!Schema::hasColumn('rapports', 'type_rapport'))
                $table->string('type_rapport')->default('general')->after('mois');
            if (!Schema::hasColumn('rapports', 'etablissement'))
                $table->string('etablissement')->nullable()->after('type_rapport');
        });
    }
    public function down(): void {}
};