<?php

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}