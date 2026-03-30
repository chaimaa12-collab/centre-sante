<?php
// app/Models/Consultation.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id', 'medecin_id', 'date', 'numero_ordre',
        'type_consultation', 'motif', 'tension', 'temperature',
        'pouls', 'poids', 'taille', 'orientation_medicale',
        'pathologies', 'notes', 'certificat_medical', 'arret_travail',
    ];

    protected $casts = [
        'date'              => 'date',
        'pathologies'       => 'array',
        'certificat_medical'=> 'boolean',
        'arret_travail'     => 'boolean',
    ];

    // ─── Relations ───────────────────────────────────────
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function medecin()
    {
        return $this->belongsTo(User::class, 'medecin_id');
    }

    public function diagnostic()
    {
        return $this->hasOne(Diagnostic::class);
    }

    public function prescription()
    {
        return $this->hasOne(Prescription::class);
    }

    public function consultationMentale()
    {
        return $this->hasOne(ConsultationMentale::class);
    }

    public function istRaa()
    {
        return $this->hasOne(IstRaa::class);
    }

    // ─── Scopes ──────────────────────────────────────────
    public function scopeAujourdhui($query)
    {
        return $query->whereDate('date', today());
    }

    public function scopeCeMois($query)
    {
        return $query->whereMonth('date', now()->month)
                     ->whereYear('date', now()->year);
    }

    public function scopeUrgences($query)
    {
        return $query->where('orientation_medicale', 'Urgences');
    }

    public function scopeOrientesSpecialiste($query)
    {
        return $query->where('orientation_medicale', 'Spécialiste');
    }
}