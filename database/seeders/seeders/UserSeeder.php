<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Personnel;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ── 1. Créer le personnel d'abord ─────────────────────
        $personnels = [
            [
                'nom'       => 'Benali',
                'prenom'    => 'Mohammed',
                'role'      => 'chef_service',
                'telephone' => '0661000001',
                'email'     => 'chef@centre-sante.ma',
            ],
            [
                'nom'       => 'Idrissi',
                'prenom'    => 'Karim',
                'role'      => 'medecin_chef',
                'telephone' => '0661000002',
                'email'     => 'medecin.chef@centre-sante.ma',
            ],
            [
                'nom'       => 'Alami',
                'prenom'    => 'Sara',
                'role'      => 'medecin_generaliste',
                'telephone' => '0661000003',
                'email'     => 'medecin@centre-sante.ma',
            ],
            [
                'nom'       => 'Ouali',
                'prenom'    => 'Fatima',
                'role'      => 'infirmiere_smi',
                'telephone' => '0661000004',
                'email'     => 'infirmiere1@centre-sante.ma',
            ],
            [
                'nom'       => 'Tahiri',
                'prenom'    => 'Nadia',
                'role'      => 'infirmiere_smi',
                'telephone' => '0661000005',
                'email'     => 'infirmiere2@centre-sante.ma',
            ],
            [
                'nom'       => 'Rahmani',
                'prenom'    => 'Youssef',
                'role'      => 'service_chroniques',
                'telephone' => '0661000006',
                'email'     => 'chroniques@centre-sante.ma',
            ],
        ];

        foreach ($personnels as $data) {
            Personnel::firstOrCreate(
                ['email' => $data['email']],
                $data
            );
        }

        // ── 2. Créer les comptes utilisateurs liés ────────────
        $users = [
            [
                'personnel_email' => 'chef@centre-sante.ma',
                'name'            => 'Chef de Service',
                'email'           => 'chef@centre-sante.ma',
                'password'        => 'Chef@2025',
                'role'            => 'admin',
            ],
            [
                'personnel_email' => 'medecin.chef@centre-sante.ma',
                'name'            => 'Dr. Idrissi Karim',
                'email'           => 'medecin.chef@centre-sante.ma',
                'password'        => 'MedecinChef@2025',
                'role'            => 'medecin_chef',
            ],
            [
                'personnel_email' => 'medecin@centre-sante.ma',
                'name'            => 'Dr. Alami Sara',
                'email'           => 'medecin@centre-sante.ma',
                'password'        => 'Medecin@2025',
                'role'            => 'medecin_generaliste',
            ],
            [
                'personnel_email' => 'infirmiere1@centre-sante.ma',
                'name'            => 'Inf. Ouali Fatima',
                'email'           => 'infirmiere1@centre-sante.ma',
                'password'        => 'Infirmiere1@2025',
                'role'            => 'infirmiere_smi',
            ],
            [
                'personnel_email' => 'infirmiere2@centre-sante.ma',
                'name'            => 'Inf. Tahiri Nadia',
                'email'           => 'infirmiere2@centre-sante.ma',
                'password'        => 'Infirmiere2@2025',
                'role'            => 'infirmiere_smi',
            ],
            [
                'personnel_email' => 'chroniques@centre-sante.ma',
                'name'            => 'Rahmani Youssef',
                'email'           => 'chroniques@centre-sante.ma',
                'password'        => 'Chroniques@2025',
                'role'            => 'service_chroniques',
            ],
        ];

        foreach ($users as $data) {
            $personnel = Personnel::where('email', $data['personnel_email'])->first();

            User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'personnel_id' => $personnel?->id,
                    'name'         => $data['name'],
                    'email'        => $data['email'],
                    'password'     => Hash::make($data['password']),
                    'role'         => $data['role'],
                    'actif'        => true,
                ]
            );
        }

        $this->command->info('✅ 6 comptes créés avec succès !');
        $this->command->table(
            ['Rôle', 'Email', 'Mot de passe'],
            collect($users)->map(fn($u) => [$u['role'], $u['email'], $u['password']])->toArray()
        );
    }
}