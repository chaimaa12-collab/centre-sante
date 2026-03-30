<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MouvementMedicament extends Model
{
    protected $table = 'mouvements_medicaments'; // ← important !

    protected $fillable = [
        'medicament_id', 'type', 'quantite', 'prix_unitaire',
        'fournisseur', 'num_bon', 'responsable',
        'date_peremption', 'motif', 'date_mouvement',
    ];

    public function medicament()
    {
        return $this->belongsTo(Medicament::class);
    }
}