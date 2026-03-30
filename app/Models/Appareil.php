<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appareil extends Model
{
    use HasFactory;

    /**
     * La table associée au modèle.
     */
    protected $table = 'appareils';

    /**
     * Les champs autorisés à l'écriture en masse (mass assignment).
     */
    protected $fillable = [
        'nom',
        'type',
        'marque',
        'numero_serie',
        'salle',
        'statut',
        'quantite',
        'derniere_maintenance',
        'service_transfere',
        'date_transfert',
        'motif_transfert',
    ];

    /**
     * Conversions automatiques de types (casting).
     */
    protected $casts = [
        'derniere_maintenance' => 'date',
        'date_transfert'       => 'date',
        'quantite'             => 'integer',
        'created_at'           => 'datetime',
        'updated_at'           => 'datetime',
    ];

    /**
     * Valeurs par défaut.
     */
    protected $attributes = [
        'statut'   => 'operationnel',
        'quantite' => 1,
    ];

    // ─────────────────────────────────────────
    // SCOPES (filtres réutilisables)
    // ─────────────────────────────────────────

    /** Appareils opérationnels */
    public function scopeOperationnels($query)
    {
        return $query->where('statut', 'operationnel');
    }

    /** Appareils en maintenance */
    public function scopeEnMaintenance($query)
    {
        return $query->where('statut', 'maintenance');
    }

    /** Appareils hors service */
    public function scopeHorsService($query)
    {
        return $query->where('statut', 'hors_service');
    }

    /** Appareils ayant été transférés */
    public function scopeTransferes($query)
    {
        return $query->whereNotNull('service_transfere');
    }

    /** Appareils d'un service donné */
    public function scopeDuService($query, string $service)
    {
        return $query->where('salle', $service);
    }

    // ─────────────────────────────────────────
    // ACCESSEURS (getters calculés)
    // ─────────────────────────────────────────

    /** Retourne le libellé lisible du statut */
    public function getStatutLabelAttribute(): string
    {
        return match ($this->statut) {
            'operationnel' => 'Opérationnel',
            'maintenance'  => 'En maintenance',
            'hors_service' => 'Hors service',
            default        => ucfirst($this->statut),
        };
    }

    /** Retourne le libellé lisible du type */
    public function getTypeLabelAttribute(): string
    {
        $labels = [
            'tensiometre'       => 'Tensiomètre',
            'glucometre'        => 'Glucomètre',
            'microscope'        => 'Microscope',
            'stethoscope'       => 'Stéthoscope',
            'thermometre'       => 'Thermomètre',
            'balance'           => 'Balance médicale',
            'electrocardiogramme' => 'Électrocardiogramme',
            'oxymetre'          => 'Oxymètre de pouls',
        ];

        return $labels[$this->type] ?? ucfirst($this->type ?? 'Autre');
    }

    /** Indique si l'appareil a été transféré */
    public function getEstTransfereAttribute(): bool
    {
        return ! is_null($this->service_transfere);
    }

    /** Indique si le stock est épuisé */
    public function getStockVideAttribute(): bool
    {
        return $this->quantite <= 0;
    }

    // ─────────────────────────────────────────
    // RELATIONS
    // ─────────────────────────────────────────

    /**
     * Les rapports liés à cet appareil.
     * Décommente si tu as un modèle Rapport avec appareil_id.
     */
    // public function rapports()
    // {
    //     return $this->hasMany(\App\Models\Rapport::class, 'appareil_id');
    // }

    /**
     * Les mouvements liés à cet appareil.
     * Décommente si tu as un modèle Mouvement avec appareil_id.
     */
    // public function mouvements()
    // {
    //     return $this->hasMany(\App\Models\Mouvement::class, 'appareil_id');
    // }
}