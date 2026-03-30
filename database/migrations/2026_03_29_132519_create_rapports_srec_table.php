<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ── 1. PLANIFICATION FAMILIALE ─────────────────────────────
        Schema::create('rapports_pf', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('mois');                    // ex: "Mars 2025"
            $table->string('circonscription')->default('Safi');

            // Nouvelles clientes PNPF
            $table->unsignedSmallInteger('pf_nouvelles_urb')->default(0);
            $table->unsignedSmallInteger('pf_nouvelles_rur')->default(0);
            $table->unsignedSmallInteger('pf_nouvelles_total')->default(0);
            $table->unsignedSmallInteger('pf_nouvelles_mobile')->default(0);

            // Clientes de retour
            $table->unsignedSmallInteger('pf_retour_urb')->default(0);
            $table->unsignedSmallInteger('pf_retour_rur')->default(0);
            $table->unsignedSmallInteger('pf_retour_total')->default(0);
            $table->unsignedSmallInteger('pf_retour_mobile')->default(0);

            // Insertions DIU
            $table->unsignedSmallInteger('pf_diu_urb')->default(0);
            $table->unsignedSmallInteger('pf_diu_rur')->default(0);
            $table->unsignedSmallInteger('pf_diu_total')->default(0);
            $table->unsignedSmallInteger('pf_diu_mobile')->default(0);

            // Injectables
            $table->unsignedSmallInteger('pf_inj_urb')->default(0);
            $table->unsignedSmallInteger('pf_inj_rur')->default(0);
            $table->unsignedSmallInteger('pf_inj_total')->default(0);
            $table->unsignedSmallInteger('pf_inj_mobile')->default(0);

            $table->timestamps();

            // Un seul rapport PF par mois et par circonscription
            $table->unique(['mois', 'circonscription']);
        });

        // ── 2. CONSULTATION PRÉNATALE ──────────────────────────────
        Schema::create('rapports_cpn', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('mois');

            // CPN 1er trimestre (≤15 SA)
            $table->unsignedSmallInteger('cpn_1er_trim_urb')->default(0);
            $table->unsignedSmallInteger('cpn_1er_trim_rur')->default(0);
            $table->unsignedSmallInteger('cpn_1er_trim_total')->default(0);
            $table->unsignedSmallInteger('cpn_1er_trim_mobile')->default(0);

            // CPN 2ème trimestre (24-28 SA)
            $table->unsignedSmallInteger('cpn_2e_trim_urb')->default(0);
            $table->unsignedSmallInteger('cpn_2e_trim_rur')->default(0);
            $table->unsignedSmallInteger('cpn_2e_trim_total')->default(0);
            $table->unsignedSmallInteger('cpn_2e_trim_mobile')->default(0);

            // CPN 3ème trimestre (32-34 SA)
            $table->unsignedSmallInteger('cpn_3e_trim_urb')->default(0);
            $table->unsignedSmallInteger('cpn_3e_trim_rur')->default(0);
            $table->unsignedSmallInteger('cpn_3e_trim_total')->default(0);
            $table->unsignedSmallInteger('cpn_3e_trim_mobile')->default(0);

            $table->timestamps();
            $table->unique(['mois']);
        });

        // ── 3. ACCOUCHEMENT ────────────────────────────────────────
        Schema::create('rapports_accouchements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('mois');

            // Voie basse non instrumentale
            $table->unsignedSmallInteger('acc_vb_urb')->default(0);
            $table->unsignedSmallInteger('acc_vb_rur')->default(0);
            $table->unsignedSmallInteger('acc_vb_total')->default(0);

            // Voie basse instrumentale
            $table->unsignedSmallInteger('acc_vbi_urb')->default(0);
            $table->unsignedSmallInteger('acc_vbi_rur')->default(0);
            $table->unsignedSmallInteger('acc_vbi_total')->default(0);

            // Césariennes
            $table->unsignedSmallInteger('acc_cesar_urb')->default(0);
            $table->unsignedSmallInteger('acc_cesar_rur')->default(0);
            $table->unsignedSmallInteger('acc_cesar_total')->default(0);

            $table->timestamps();
            $table->unique(['mois']);
        });

        // ── 4. VACCINATION ─────────────────────────────────────────
        Schema::create('rapports_vaccination', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('mois');

            // BCG
            $table->unsignedSmallInteger('vacc_bcg_g')->default(0);
            $table->unsignedSmallInteger('vacc_bcg_f')->default(0);
            $table->unsignedSmallInteger('vacc_bcg_total')->default(0);

            // Penta 1
            $table->unsignedSmallInteger('vacc_penta1_g')->default(0);
            $table->unsignedSmallInteger('vacc_penta1_f')->default(0);
            $table->unsignedSmallInteger('vacc_penta1_total')->default(0);

            // Penta 2
            $table->unsignedSmallInteger('vacc_penta2_g')->default(0);
            $table->unsignedSmallInteger('vacc_penta2_f')->default(0);
            $table->unsignedSmallInteger('vacc_penta2_total')->default(0);

            // Penta 3
            $table->unsignedSmallInteger('vacc_penta3_g')->default(0);
            $table->unsignedSmallInteger('vacc_penta3_f')->default(0);
            $table->unsignedSmallInteger('vacc_penta3_total')->default(0);

            // RR 1
            $table->unsignedSmallInteger('vacc_rr1_g')->default(0);
            $table->unsignedSmallInteger('vacc_rr1_f')->default(0);
            $table->unsignedSmallInteger('vacc_rr1_total')->default(0);

            $table->timestamps();
            $table->unique(['mois']);
        });

        // ── 5. ENFANT < 5 ANS ──────────────────────────────────────
        Schema::create('rapports_enfants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('mois');

            $table->unsignedSmallInteger('enf_visites_0_2')->default(0);
            $table->unsignedSmallInteger('enf_visites_2_59')->default(0);
            $table->unsignedSmallInteger('enf_premiers_contacts')->default(0);

            $table->timestamps();
            $table->unique(['mois']);
        });

        // ── 6. MALADIES CHRONIQUES ─────────────────────────────────
        Schema::create('rapports_chroniques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('mois');

            // Diabète
            $table->unsignedSmallInteger('diab_nouveaux')->default(0);
            $table->unsignedSmallInteger('diab_anciens')->default(0);
            $table->unsignedSmallInteger('diab_m')->default(0);
            $table->unsignedSmallInteger('diab_f')->default(0);

            // HTA
            $table->unsignedSmallInteger('hta_nouveaux')->default(0);
            $table->unsignedSmallInteger('hta_anciens')->default(0);
            $table->unsignedSmallInteger('hta_m')->default(0);
            $table->unsignedSmallInteger('hta_f')->default(0);

            $table->timestamps();
            $table->unique(['mois']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rapports_chroniques');
        Schema::dropIfExists('rapports_enfants');
        Schema::dropIfExists('rapports_vaccination');
        Schema::dropIfExists('rapports_accouchements');
        Schema::dropIfExists('rapports_cpn');
        Schema::dropIfExists('rapports_pf');
    }
};