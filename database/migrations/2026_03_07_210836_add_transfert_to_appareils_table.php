<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('appareils', function (Blueprint $table) {
            if (!Schema::hasColumn('appareils', 'service_transfere'))
                $table->string('service_transfere')->nullable();
            if (!Schema::hasColumn('appareils', 'date_transfert'))
                $table->date('date_transfert')->nullable();
            if (!Schema::hasColumn('appareils', 'motif_transfert'))
                $table->text('motif_transfert')->nullable();
        });
    }
    public function down(): void {}
};