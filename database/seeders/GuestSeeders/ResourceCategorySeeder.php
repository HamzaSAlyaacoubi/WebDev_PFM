<?php

namespace Database\Seeders\GuestSeeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ResourceCategory;

class ResourceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ResourceCategory::firstOrCreate([
            'name' => 'Servers',
            'description' => 'Powerful and reliable servers for all your hosting needs.'
        ]);
        ResourceCategory::firstOrCreate([
            'name' => 'Virtual Machines',
            'description' => 'Scalable virtual machines for flexible computing environments.'
        ]);
        ResourceCategory::firstOrCreate([
            'name' => 'Networking equipment',
            'description' => 'High-performance networking resources to keep you connected.'
        ]);        
        ResourceCategory::firstOrCreate([
            'name' => 'Storage',
            'description' => 'Secure and efficient storage solutions for your data.'
        ]);
        
    }
}
