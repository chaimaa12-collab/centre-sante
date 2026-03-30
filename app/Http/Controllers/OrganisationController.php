<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganisationController extends Controller
{
    public function index()
    {
        $personnel = [
            [
                'role'    => 'Chef de Service',
                'type'    => 'chef',
                'count'   => 1,
                'icon'    => '👨‍💼',
                'color'   => 'gold',
                'duties'  => [
                    'Gestion des ressources humaines',
                    'Rapport mensuel',
                    'Supervision administrative',
                    'Coordination des équipes',
                ],
            ],
            [
                'role'    => 'Médecin Chef',
                'type'    => 'medecin',
                'count'   => 1,
                'icon'    => '👨‍⚕️',
                'color'   => 'gold',
                'tags'    => ['Responsable médical', 'Supervision clinique'],
                'duties'  => [
                    'Direction médicale et supervision des consultations',
                    'Validation des protocoles de soins',
                    'Coordination avec le chef de service',
                    'Prise en charge des cas complexes',
                ],
            ],
            [
                'role'    => 'Médecin Généraliste',
                'type'    => 'medecin',
                'count'   => 1,
                'icon'    => '👩‍⚕️',
                'color'   => 'blue',
                'tags'    => ['Consultations générales', 'Prescriptions'],
                'duties'  => [
                    'Consultations médicales quotidiennes',
                    'Examens cliniques et diagnostics',
                    'Suivi et renouvellement des ordonnances',
                    'Référencement vers les spécialistes',
                ],
            ],
            [
                'role'    => 'Infirmière — Santé Maternelle et Infantile',
                'type'    => 'infirmiere',
                'count'   => 2,
                'icon'    => '👩‍⚕️',
                'color'   => 'teal',
                'tags'    => ['Maternité', 'Pédiatrie', 'Vaccination'],
                'duties'  => [
                    'Suivi prénatal et postnatal des mères',
                    'Consultations nourrissons et enfants',
                    'Administration du programme de vaccination',
                    'Planification familiale et conseil',
                    'Pesée, toise et courbes de croissance',
                ],
            ],
            [
                'role'    => 'Service — Maladies Chroniques',
                'type'    => 'service',
                'count'   => 1,
                'icon'    => '🩺',
                'color'   => 'rose',
                'tags'    => ['Diabète', 'Hypertension', 'Suivi long terme'],
                'duties'  => [
                    'Suivi régulier des patients diabétiques',
                    'Contrôle et surveillance de l\'hypertension',
                    'Gestion des ordonnances chroniques',
                    'Éducation thérapeutique des patients',
                    'Coordination avec le médecin généraliste',
                ],
            ],
        ];

        $totaux = [
            'total'      => 6,
            'medecins'   => 2,
            'infirmieres'=> 2,
            'chroniques' => 1,
            'chef'       => 1,
        ];

        return view('organisation', compact('personnel', 'totaux'));
    }
}