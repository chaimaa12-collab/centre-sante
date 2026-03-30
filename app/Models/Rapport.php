<?php
// ============================================================
//  app/Models/RapportPf.php
// ============================================================
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RapportPf extends Model
{
    protected $table = 'rapports_pf';

    protected $fillable = [
        'user_id', 'mois', 'circonscription',
        'pf_nouvelles_urb',  'pf_nouvelles_rur',  'pf_nouvelles_total',  'pf_nouvelles_mobile',
        'pf_retour_urb',     'pf_retour_rur',     'pf_retour_total',     'pf_retour_mobile',
        'pf_diu_urb',        'pf_diu_rur',        'pf_diu_total',        'pf_diu_mobile',
        'pf_inj_urb',        'pf_inj_rur',        'pf_inj_total',        'pf_inj_mobile',
    ];

    protected $casts = [
        'pf_nouvelles_urb'   => 'integer', 'pf_nouvelles_rur'   => 'integer',
        'pf_nouvelles_total' => 'integer', 'pf_nouvelles_mobile'=> 'integer',
        'pf_retour_urb'      => 'integer', 'pf_retour_rur'      => 'integer',
        'pf_retour_total'    => 'integer', 'pf_retour_mobile'   => 'integer',
        'pf_diu_urb'         => 'integer', 'pf_diu_rur'         => 'integer',
        'pf_diu_total'       => 'integer', 'pf_diu_mobile'      => 'integer',
        'pf_inj_urb'         => 'integer', 'pf_inj_rur'         => 'integer',
        'pf_inj_total'       => 'integer', 'pf_inj_mobile'      => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}


// ============================================================
//  app/Models/RapportCpn.php
// ============================================================
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RapportCpn extends Model
{
    protected $table = 'rapports_cpn';

    protected $fillable = [
        'user_id', 'mois',
        'cpn_1er_trim_urb',  'cpn_1er_trim_rur',  'cpn_1er_trim_total',  'cpn_1er_trim_mobile',
        'cpn_2e_trim_urb',   'cpn_2e_trim_rur',   'cpn_2e_trim_total',   'cpn_2e_trim_mobile',
        'cpn_3e_trim_urb',   'cpn_3e_trim_rur',   'cpn_3e_trim_total',   'cpn_3e_trim_mobile',
    ];

    public function user(): BelongsTo { return $this->belongsTo(User::class); }
}


// ============================================================
//  app/Models/RapportAccouchement.php
// ============================================================
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RapportAccouchement extends Model
{
    protected $table = 'rapports_accouchements';

    protected $fillable = [
        'user_id', 'mois',
        'acc_vb_urb',    'acc_vb_rur',    'acc_vb_total',
        'acc_vbi_urb',   'acc_vbi_rur',   'acc_vbi_total',
        'acc_cesar_urb', 'acc_cesar_rur', 'acc_cesar_total',
    ];

    public function user(): BelongsTo { return $this->belongsTo(User::class); }
}


// ============================================================
//  app/Models/RapportVaccination.php
// ============================================================
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RapportVaccination extends Model
{
    protected $table = 'rapports_vaccination';

    protected $fillable = [
        'user_id', 'mois',
        'vacc_bcg_g',    'vacc_bcg_f',    'vacc_bcg_total',
        'vacc_penta1_g', 'vacc_penta1_f', 'vacc_penta1_total',
        'vacc_penta2_g', 'vacc_penta2_f', 'vacc_penta2_total',
        'vacc_penta3_g', 'vacc_penta3_f', 'vacc_penta3_total',
        'vacc_rr1_g',    'vacc_rr1_f',    'vacc_rr1_total',
    ];

    public function user(): BelongsTo { return $this->belongsTo(User::class); }
}


// ============================================================
//  app/Models/RapportEnfant.php
// ============================================================
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RapportEnfant extends Model
{
    protected $table = 'rapports_enfants';

    protected $fillable = [
        'user_id', 'mois',
        'enf_visites_0_2', 'enf_visites_2_59', 'enf_premiers_contacts',
    ];

    public function user(): BelongsTo { return $this->belongsTo(User::class); }
}


// ============================================================
//  app/Models/RapportChronique.php
// ============================================================
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RapportChronique extends Model
{
    protected $table = 'rapports_chroniques';

    protected $fillable = [
        'user_id', 'mois',
        'diab_nouveaux', 'diab_anciens', 'diab_m', 'diab_f',
        'hta_nouveaux',  'hta_anciens',  'hta_m',  'hta_f',
    ];

    public function user(): BelongsTo { return $this->belongsTo(User::class); }
}