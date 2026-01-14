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
                'category_id' => $serverCategory->id,
                'cpu' => 16,
                'ram' => 64,
                'storage' => 2000,
                'os' => 'Linux',
                'location' => 'Datacenter Room A',
                'status' => 'disponible'
            ]
        );

        Resource::firstOrCreate(
            ['name' => 'Virtual Machine VM-01'],
            [
                'manufacturer' => 'VMware',
                'category_id' => $vmCategory->id,
                'cpu' => 4,
                'ram' => 16,
                'storage' => 500,
                'os' => 'Windows Server',
                'location' => 'Cloud',
                'status' => 'maintenance'
            ]
        );

        Resource::firstOrCreate(
            ['name' => 'Network Switch Cisco'],
            [
                'manufacturer' => 'Cisco',
                'category_id' => $networkCategory->id,
                'cpu' => 0,
                'ram' => 0,
                'storage' => 0,
                'os' => null,
                'location' => 'Datacenter Room B',
                'status' => 'disponible'
            ]
        );

        Resource::firstOrCreate(
            ['name' => 'Storage Array Dell EMC'],
            [
                'manufacturer' => 'Dell EMC',
                'category_id' => $storageCategory->id,
                'cpu' => 0,
                'ram' => 0,
                'storage' => 10000,
                'os' => null,
                'location' => 'Datacenter Room C',
                'status' => 'indisponible'
            ]
        );
        Resource::firstOrCreate(
            ['name' => 'Virtual Machine VM-02'],
            [
                'manufacturer' => 'VMware',
                'category_id' => $vmCategory->id,
                'cpu' => 2,
                'ram' => 8,
                'storage' => 250,
                'os' => 'Ubuntu',
                'location' => 'Cloud',
                'status' => 'disponible'
            ]
        );
        Resource::firstOrCreate(
            ['name' => 'Server Dell PowerEdge'],
            [
                'manufacturer' => 'Dell',
                'category_id' => $serverCategory->id,
                'cpu' => 32,
                'ram' => 128,
                'storage' => 4000,
                'os' => 'Windows Server',
                'location' => 'Datacenter Room D',
                'status' => 'maintenance'
            ]
        );
        Resource::firstOrCreate(
            ['name' => 'Storage NAS Synology'],
            [
                'manufacturer' => 'Synology',
                'category_id' => $storageCategory->id,
                'cpu' => 0,
                'ram' => 0,
                'storage' => 5000,
                'os' => null,
                'location' => 'Office',
                'status' => 'disponible'
            ]
        );
        Resource::firstOrCreate(
            ['name' => 'Network Router Juniper'],
            [
                'manufacturer' => 'Juniper',
                'category_id' => $networkCategory->id,
                'cpu' => 0,
                'ram' => 0,
                'storage' => 0,
                'os' => null,
                'location' => 'Datacenter Room E',
                'status' => 'indisponible'
            ]
        );
    }
}
