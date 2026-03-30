<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RapportEnfant extends Model
{
    protected $table = 'rapports_enfants';

    protected $fillable = [
        'user_id', 'mois',
        'enf_visites_0_2',
        'enf_visites_2_59',
        'enf_premiers_contacts',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}