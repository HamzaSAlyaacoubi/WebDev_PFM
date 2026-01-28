<?php

namespace Database\Seeders;

use App\Models\ResourceCategory;
use App\Models\Servers;
use Illuminate\Database\Seeder;

class ServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $server = ResourceCategory::firstOrCreate(['name' => 'Servers']);

        Servers::firstOrCreate(
            [
                'name' => 'Server HP ProLiant',
                'brand' => 'HP',
                'cpu' => 16,
                'ram' => 64,
                'storage' => 2000,
                'storage_type' => 'SSD',
                'os' => 'Linux',
                'location' => 'Datacenter Room A',
                'status' => 'disponible',
                'quantity_available' => 5,
                'description' => null,
                'id_category' => $server->id
            ]
        );

        Servers::firstOrCreate(
            [
                'name' => 'Server DELL',
                'brand' => 'DELL',
                'cpu' => 32,
                'ram' => 32,
                'storage' => 1000,
                'storage_type' => 'SSD',
                'os' => 'Windows',
                'location' => 'Datacenter Room B',
                'status' => 'disponible',
                'quantity_available' => 3,
                'description' => null,
                'id_category' => $server->id
            ]
        );

        Servers::firstOrCreate(
            [
                'name' => 'Server Lenovo',
                'brand' => 'Lenovo',
                'cpu' => 16,
                'ram' => 64,
                'storage' => 3000,
                'storage_type' => 'HDD',
                'os' => 'Windows',
                'location' => 'Datacenter Room A',
                'status' => 'indisponible',
                'quantity_available' => 0,
                'description' => null,
                'id_category' => $server->id
            ]
        );
    }
}
