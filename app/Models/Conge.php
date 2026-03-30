<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    protected $fillable = [
    'nom_agent','matricule','grade','service','type',
    'date_debut','date_fin','nb_jours','remplacant',
    'observations','statut','valide_par',
];

protected $casts = [
    'date_debut' => 'date',
    'date_fin'   => 'date',
];
}
