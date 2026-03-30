<?php

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}