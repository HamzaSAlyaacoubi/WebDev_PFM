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
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => 'jjj',
            'type' => 'utilisateur',
        ]);
        User::firstOrCreate([
            'name' => 'user2',
            'email' => 'user2@gmail.com',
            'password' => 'jjj',
            'type' => 'utilisateur',
        ]);
        User::firstOrCreate([
            'name' => 'user3',
            'email' => 'user3@gmail.com',
            'password' => 'jjj',
            'type' => 'utilisateur',
        ]);

        // Responsable
        User::firstOrCreate([
            'name' => 'responsable',
            'email' => 'responsable@gmail.com',
            'password' => 'jjj',
            'type' => 'responsable',
            'category' => 'Servers',
            'id_category' => 1
        ]);
        User::firstOrCreate([
            'name' => 'responsable1',
            'email' => 'responsable1@gmail.com',
            'password' => 'jjj',
            'type' => 'responsable',
            'category' => 'Virtual Machines',
            'id_category' => 2
        ]);
        User::firstOrCreate([
            'name' => 'responsable2',
            'email' => 'responsable2@gmail.com',
            'password' => 'jjj',
            'type' => 'responsable',
            'category' => 'Networking equipment',
            'id_category' => 3
        ]);
        User::firstOrCreate([
            'name' => 'responsable3',
            'email' => 'responsable3@gmail.com',
            'password' => 'jjj',
            'type' => 'responsable',
            'category' => 'Storage',
            'id_category' => 4
        ]);
    }
}
