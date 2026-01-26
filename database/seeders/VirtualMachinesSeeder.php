<?php

namespace Database\Seeders;

use App\Models\ResourceCategory;
use App\Models\VirtualMachines;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VirtualMachinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $virtualMachine = ResourceCategory::firstOrCreate(['name' => 'Virtual Machines']);

        VirtualMachines::firstOrCreate([
            'name' => 'Virtual Machine VM-01',
            'cpu' => 16,
            'ram' => 64,
            'storage' => 2000,
            'storage_type' => 'SSD',
            'os' => 'Linux',
            'ip_address' => '192.168.1.1',
            'server_hote' => 'Server HP ProLiant',
            'status' => 'disponible',
            'quantity_available' => 5,
            'description' => null,
            'id_category' => $virtualMachine->id
        ]);

        VirtualMachines::firstOrCreate([
            'name' => 'Virtual Machine VM-02',
            'cpu' => 16,
            'ram' => 64,
            'storage' => 2000,
            'storage_type' => 'HDD',
            'os' => 'Linux',
            'ip_address' => '192.168.1.2',
            'server_hote' => 'Server DELL',
            'status' => 'disponible',
            'quantity_available' => 10,
            'description' => null,
            'id_category' => $virtualMachine->id
        ]);

        VirtualMachines::firstOrCreate([
            'name' => 'Virtual Machine VM-03',
            'cpu' => 16,
            'ram' => 32,
            'storage' => 1000,
            'storage_type' => 'SSD',
            'os' => 'Windows',
            'ip_address' => '192.168.1.3',
            'server_hote' => 'Server Lenovo',
            'status' => 'disponible',
            'quantity_available' => 3,
            'description' => null,
            'id_category' => $virtualMachine->id
        ]);

        VirtualMachines::firstOrCreate([
            'name' => 'Virtual Machine VM-04',
            'cpu' => 24,
            'ram' => 64,
            'storage' => 2000,
            'storage_type' => 'SSD',
            'os' => 'Windows',
            'ip_address' => '192.168.1.4',
            'server_hote' => 'Server HP',
            'status' => 'indisponible',
            'quantity_available' => 0,
            'description' => null,
            'id_category' => $virtualMachine->id
        ]);
    }
}
