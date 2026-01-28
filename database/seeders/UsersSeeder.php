<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Utilisateurs
        User::firstOrCreate([
            'name' => 'Hamza',
            'email' => 'hamza@gmail.com',
            'password' => 'jjj',
            'type' => 'utilisateur',
        ]);
        User::firstOrCreate([
            'name' => 'yassine',
            'email' => 'yassine@gmail.com',
            'password' => 'jjj',
            'type' => 'utilisateur',
        ]);
        User::firstOrCreate([
            'name' => 'adam',
            'email' => 'adam@gmail.com',
            'password' => 'jjj',
            'type' => 'utilisateur',
        ]);
        User::firstOrCreate([
            'name' => 'chemseddine',
            'email' => 'chemseddine@gmail.com',
            'password' => 'jjj',
            'type' => 'utilisateur',
        ]);

        // Responsable
        User::firstOrCreate([
            'name' => 'Responsable Serveur',
            'email' => 'responsable@gmail.com',
            'password' => 'jjj',
            'type' => 'responsable',
            'category' => 'Servers',
            'id_category' => 1
        ]);
        User::firstOrCreate([
            'name' => 'Responsable Vms',
            'email' => 'responsable1@gmail.com',
            'password' => 'jjj',
            'type' => 'responsable',
            'category' => 'Virtual Machines',
            'id_category' => 2
        ]);
        User::firstOrCreate([
            'name' => 'Responsable Network',
            'email' => 'responsable2@gmail.com',
            'password' => 'jjj',
            'type' => 'responsable',
            'category' => 'Networking equipment',
            'id_category' => 3
        ]);
        User::firstOrCreate([
            'name' => 'Responsable Storage',
            'email' => 'responsable3@gmail.com',
            'password' => 'jjj',
            'type' => 'responsable',
            'category' => 'Storage',
            'id_category' => 4
        ]);
    }
}
