<?php

namespace Database\Seeders\GuestSeeders;

use Illuminate\Database\Seeder;
use App\Models\Resource;
use App\Models\ResourceCategory;

class ResourceSeeder extends Seeder
{
    public function run(): void
    {
        $serverCategory = ResourceCategory::firstOrCreate(['name' => 'Servers']);
        $vmCategory = ResourceCategory::firstOrCreate(['name' => 'Virtual Machines']);
        $networkCategory = ResourceCategory::firstOrCreate(['name' => 'Networking equipment']);
        $storageCategory = ResourceCategory::firstOrCreate(['name' => 'Storage']);

        Resource::firstOrCreate(
            ['name' => 'Server HP ProLiant'],
            [
                'manufacturer' => 'HP',
                'id_category' => $serverCategory->id,
                'cpu' => 16,
                'ram' => 64,
                'storage' => 2000,
                'os' => 'Linux',
                'location' => 'Datacenter Room A',
                'status' => 'disponible',
                'image' => 'images/Ressources/HPProliant1.jpg'
            ]
        );

        Resource::firstOrCreate(
            ['name' => 'Virtual Machine VM-01'],
            [
                'manufacturer' => 'VMware',
                'id_category' => $vmCategory->id,
                'cpu' => 4,
                'ram' => 16,
                'storage' => 500,
                'os' => 'Windows Server',
                'location' => 'Cloud',
                'status' => 'disponible',
                'image' => 'images/Ressources/VMwin1.jpg'
            ]
        );

        Resource::firstOrCreate(
            ['name' => 'Network Switch Cisco'],
            [
                'manufacturer' => 'Cisco',
                'id_category' => $networkCategory->id,
                'cpu' => 0,
                'ram' => 0,
                'storage' => 0,
                'os' => null,
                'location' => 'Datacenter Room B',
                'status' => 'disponible',
                'image' => 'images/Ressources/Cisco1.jpg'
            ]
        );

        Resource::firstOrCreate(
            ['name' => 'Storage Array Dell EMC'],
            [
                'manufacturer' => 'Dell EMC',
                'id_category' => $storageCategory->id,
                'cpu' => 0,
                'ram' => 0,
                'storage' => 10000,
                'os' => null,
                'location' => 'Datacenter Room C',
                'status' => 'disponible',
                'image' => 'images/Ressources/Storage1.jpg'
            ]
        );
    }
}
