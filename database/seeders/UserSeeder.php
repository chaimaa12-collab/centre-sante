<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Vérifie si la colonne 'actif' existe dans users
        $hasActif = Schema::hasColumn('users', 'actif');

        $users = [
            [
                'name'     => 'Chef de Service',
                'email'    => 'chef@centre-sante.ma',
                'password' => Hash::make('Chef@2025'),
                'role'     => 'admin',
            ],
            [
                'name'     => 'Dr. Idrissi Karim',
                'email'    => 'medecin.chef@centre-sante.ma',
                'password' => Hash::make('MedecinChef@2025'),
                'role'     => 'medecin_chef',
            ],
            [
                'name'     => 'Dr. Alami Sara',
                'email'    => 'medecin@centre-sante.ma',
                'password' => Hash::make('Medecin@2025'),
                'role'     => 'medecin_generaliste',
            ],
            [
                'name'     => 'Inf. Ouali Fatima',
                'email'    => 'infirmiere1@centre-sante.ma',
                'password' => Hash::make('Infirmiere1@2025'),
                'role'     => 'infirmiere_smi',
            ],
            [
                'name'     => 'Inf. Tahiri Nadia',
                'email'    => 'infirmiere2@centre-sante.ma',
                'password' => Hash::make('Infirmiere2@2025'),
                'role'     => 'infirmiere_smi',
            ],
            [
                'name'     => 'Rahmani Youssef',
                'email'    => 'chroniques@centre-sante.ma',
                'password' => Hash::make('Chroniques@2025'),
                'role'     => 'service_chroniques',
            ],
        ];

        foreach ($users as $user) {
            $data = [
                'name'       => $user['name'],
                'email'      => $user['email'],
                'password'   => $user['password'],
                'role'       => $user['role'],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Ajoute 'actif' seulement si la colonne existe
            if ($hasActif) {
                $data['actif'] = 1;
            }

            DB::table('users')->updateOrInsert(
                ['email' => $user['email']],
                $data
            );
        }

        $this->command->info('✅ 6 comptes créés avec succès !');
        $this->command->table(
            ['Nom', 'Email', 'Mot de passe', 'Rôle'],
            [
                ['Chef de Service',   'chef@centre-sante.ma',         'Chef@2025',        'admin'],
                ['Dr. Idrissi Karim', 'medecin.chef@centre-sante.ma', 'MedecinChef@2025', 'medecin_chef'],
                ['Dr. Alami Sara',    'medecin@centre-sante.ma',      'Medecin@2025',     'medecin_generaliste'],
                ['Inf. Ouali Fatima', 'infirmiere1@centre-sante.ma',  'Infirmiere1@2025', 'infirmiere_smi'],
                ['Inf. Tahiri Nadia', 'infirmiere2@centre-sante.ma',  'Infirmiere2@2025', 'infirmiere_smi'],
                ['Rahmani Youssef',   'chroniques@centre-sante.ma',   'Chroniques@2025',  'service_chroniques'],
            ]
        );
    }
}