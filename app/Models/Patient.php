<?php
// app/Models/Patient.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_dossier', 'nom_prenom', 'date_naissance', 'age',
        'sexe', 'adresse', 'provenance', 'migrant', 'telephone',
        'cin', 'antecedents', 'allergies', 'pathologies_chroniques', 'is_active',
    ];

    protected $casts = [
        'pathologies_chroniques' => 'array',
        'migrant'                => 'boolean',
        'is_active'              => 'boolean',
        'date_naissance'         => 'date',
    ];

    // ─── Relations ───────────────────────────────────────
    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }

    public function diagnostics()
    {
        return $this->hasMany(Diagnostic::class);
    }

    public function derniereConsultation()
    {
        return $this->hasOne(Consultation::class)->latestOfMany('date');
    }

    // ─── Scopes ──────────────────────────────────────────
    public function scopeActifs($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeUrbanins($query)
    {
        return $query->where('provenance', 'Urbaine');
    }

    public function scopeRuraux($query)
    {
        return $query->where('provenance', 'Rurale');
    }

    // ─── Accessors ───────────────────────────────────────
    public function getInitialesAttribute(): string
    {
        $mots = explode(' ', $this->nom_prenom);
        return strtoupper(substr($mots[0], 0, 1) . substr($mots[1] ?? '', 0, 1));
    }
}