<?php

namespace Database\Seeders;

use App\Models\Network;
use App\Models\ResourceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $network = ResourceCategory::firstOrCreate(['name' => 'Networking equipment']);

        Network::firstOrCreate([
            'name' => 'Core-Switch-01',
            'brand' => 'Cisco',
            'type' => 'Switch',
            'model' => 'Catalyst 9300',
            'port_number' => 48,
            'speed' => '10 Gbps',
            'status' => 'disponible',
            'quantity_available' => 5,
            'description' => null,
            'id_categorie' => $network->id,
        ]);

        Network::firstOrCreate([
            'name' => 'Edge-Router-01',
            'brand' => 'Juniper',
            'type' => 'Router',
            'model' => 'MX204',
            'port_number' => 8,
            'speed' => '100 Gbps',
            'status' => 'indisponible',
            'quantity_available' => 0,
            'description' => null,
            'id_categorie' => $network->id,
        ]);

        Network::firstOrCreate([
            'name' => 'Firewall-DC-01',
            'brand' => 'Fortinet',
            'type' => 'Firewall',
            'model' => 'FortiGate 200F',
            'port_number' => 16,
            'speed' => '10 Gbps',
            'status' => 'disponible',
            'quantity_available' => 10,
            'description' => null,
            'id_categorie' => $network->id,
        ]);

        Network::firstOrCreate([
            'name' => 'Edge-Router-02',
            'brand' => 'Cisco',
            'type' => 'Router',
            'model' => 'ISR 4451-X',
            'port_number' => 12,
            'speed' => '10 Gbps',
            'status' => 'disponible',
            'quantity_available' => 3,
            'description' => null,
            'id_categorie' => $network->id,
        ]);
    }
}
