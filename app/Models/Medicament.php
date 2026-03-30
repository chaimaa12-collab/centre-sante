<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    protected $fillable = [
    'nom', 'dci', 'categorie', 'forme', 'prix',
    'unites_boite', 'quantite', 'seuil_alerte',
    'fournisseur', 'code', 'date_peremption',
];
public function mouvements()
{
    return $this->hasMany(MouvementMedicament::class);
}
}