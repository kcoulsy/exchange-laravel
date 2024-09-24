<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesAndPermissions::class);
        $this->call(Brands::class);
        $this->call(Categories::class);
        $this->call(Conditions::class);
        $this->call(Currencies::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Call the ListingSeeder
        $this->call([
            ListingSeeder::class,
        ]);
    }
}
