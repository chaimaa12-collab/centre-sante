<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RapportPf extends Model
{
    protected $table = 'rapports_pf';

    protected $fillable = [
        'user_id', 'mois', 'circonscription',
        'pf_nouvelles_urb',   'pf_nouvelles_rur',   'pf_nouvelles_total',   'pf_nouvelles_mobile',
        'pf_retour_urb',      'pf_retour_rur',      'pf_retour_total',      'pf_retour_mobile',
        'pf_diu_urb',         'pf_diu_rur',         'pf_diu_total',         'pf_diu_mobile',
        'pf_inj_urb',         'pf_inj_rur',         'pf_inj_total',         'pf_inj_mobile',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}