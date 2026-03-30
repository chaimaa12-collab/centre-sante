<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Declaration extends Model
{
    use HasFactory;

    // 🔹 Facultatif (Laravel devine déjà "declarations")
    protected $table = 'declarations';

    // 🔹 Champs autorisés pour insert
    protected $fillable = [
        'nom_agent',
        'matricule',
        'grade',
        'service',
        'cin',
        'type',
        'urgence',
        'date_faits',
        'date_decl',
        'description',
        'observations',
        'declare_par',
        'statut',
    ];

    // 🔹 Conversion automatique des dates
    protected $casts = [
        'date_faits' => 'date',
        'date_decl'  => 'date',
    ];

    /*
    |--------------------------------------------------------------------------
    | Accessors (Attributs calculés)
    |--------------------------------------------------------------------------
    */

    // 🔹 Type lisible
    public function getTypeLibelleAttribute(): string
    {
        return match ($this->type) {
            'accident'      => 'Accident de travail',
            'maladie'       => 'Maladie professionnelle',
            'incident'      => 'Incident / Signalement',
            'absence'       => 'Absence injustifiée',
            'disciplinaire' => 'Faute disciplinaire',
            'autre'         => 'Autre',
            default         => $this->type ?? '',
        };
    }

    // 🔹 Statut lisible
    public function getStatutLibelleAttribute(): string
    {
        return match ($this->statut) {
            'en_attente' => 'En attente',
            'en_cours'   => 'En cours',
            'valide'     => 'Validé',
            'classe'     => 'Classé sans suite',
            default      => $this->statut ?? '',
        };
    }

    // 🔹 Couleur urgence (pour badge UI)
    public function getUrgenceCouleurAttribute(): string
    {
        return match ($this->urgence) {
            'Très urgent' => 'danger',
            'Urgent'      => 'warning',
            default       => 'success',
        };
    }
}