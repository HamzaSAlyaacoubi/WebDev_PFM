<?php

namespace Database\Seeders;

use App\Models\ResourceCategory;
use App\Models\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $storage = ResourceCategory::firstOrCreate(['name' => 'Storage']);

        Storage::firstOrCreate([
            'name' => 'Storage-NAS-01',
            'brand' => 'Synology',
            'capacity' => '10 TB',
            'type' => 'NAS',
            'speed' => '1 Gbps',
            'status' => 'disponible',
            'quantity_available' => 3,
            'description' => null,
            'id_category' => $storage->id,
        ]);

        Storage::firstOrCreate([
            'name' => 'Storage-SAN-01',
            'brand' => 'DELL',
            'capacity' => '5 TB',
            'type' => 'SAN',
            'speed' => '16 Gbps',
            'status' => 'disponible',
            'quantity_available' => 10,
            'description' => null,
            'id_category' => $storage->id,
        ]);

        Storage::firstOrCreate([
            'name' => 'Storage-SSD-01',
            'brand' => 'HP',
            'capacity' => '4TB',
            'type' => 'SSD',
            'speed' => '6 Gbps',
            'status' => 'disponible',
            'quantity_available' => 15,
            'description' => null,
            'id_category' => $storage->id,
        ]);

        Storage::firstOrCreate([
            'name' => 'Storage-HDD-01',
            'brand' => 'Seagate',
            'capacity' => '15 TB',
            'type' => 'HDD',
            'speed' => '3 Gbps',
            'status' => 'indisponible',
            'quantity_available' => 0,
            'description' => null,
            'id_category' => $storage->id,
        ]);
    }
}
