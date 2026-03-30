<?php

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}