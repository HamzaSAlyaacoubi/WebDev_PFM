<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\GuestSeeders\ResourceCategorySeeder;
use Database\Seeders\GuestSeeders\ResourceSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Administrateur',
            'email' => 'Administrateur@gmail.com',
            'password' => 'password',
            'type' => 'administrateur',
        ]);

        $this->call([
                    ResourceCategorySeeder::class,
                    ResourceSeeder::class,
                ]);
    }
}
