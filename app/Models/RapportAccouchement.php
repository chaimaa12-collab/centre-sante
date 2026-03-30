<?php

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}